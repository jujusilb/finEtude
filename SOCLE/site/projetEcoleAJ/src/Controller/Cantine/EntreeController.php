<?php

namespace App\Controller\Cantine;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cantine\Entree;
use App\Repository\Cantine\EntreeRepository;
use App\Form\Cantine\EntreeType;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/entree', name: 'entree_')]
class EntreeController extends AbstractController
{

    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(EntreeRepository $entreeRepo): Response
    {
	
        return $this->render('cantine/Entree/index.html.twig', [
            'controller_name' => 'EntreeController',
		    'titre' => 'Entree',
            'entrees' => $entreeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $entree = new Entree();
        $form = $this->createForm(EntreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($entree);
            $this->entityManager->flush();

            return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/entree/new.html.twig', [
            'entree' => $entree,
            'titre' => 'Nouvelle Entree',
            'entreeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Entree $entree): Response
    {
        return $this->render('cantine/entree/show.html.twig', [
            'entree' => $entree,
            'titre' => 'Affichage '.$entree->getLibelle(),
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entree $entree): Response
    {
        $form = $this->createForm(entreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/entree/edit.html.twig', [
            'entree' => $entree,
            'titre' => 'Edition Entree',
            'entreeForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Entree $entree): Response
    {
        if ($this->isCsrfTokenValid('delete' . $entree->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($entree);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
    }

}
