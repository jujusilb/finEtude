<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Legume;
use App\Repository\Cantine\LegumeRepository;
use App\Form\Cantine\LegumeType;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/legume', name: 'legume_')]
class LegumeController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(LegumeRepository $legumeRepo): Response
    {
	
        return $this->render('cantine/Legume/index.html.twig', [
            'controller_name' => 'LegumeController',
		    'titre' => 'Légume',
            'legumes' => $legumeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $legume = new Legume();
        $form = $this->createForm(LegumeType::class, $legume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($legume);
            $this->entityManager->flush();

            return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/legume/new.html.twig', [
            'legume' => $legume,
            'titre' => 'Nouveau Légume',
            'legumeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Legume $legume): Response
    {
        return $this->render('caine/legume/show.html.twig', [
            'legume' => $legume,
            'titre' => 'Affichage '.$legume->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Legume $legume): Response
    {
        $form = $this->createForm(legumeType::class, $legume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/legume/edit.html.twig', [
            'legume' => $legume,
            'titre' => 'Edition Légume',
            'legumeForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Legume $legume): Response
    {
        if ($this->isCsrfTokenValid('delete' . $legume->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($legume);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
    }
}
