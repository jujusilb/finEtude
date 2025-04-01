<?php

namespace App\Controller\CDI;

use App\Entity\CDI\StatutEmprunt;
use App\Repository\CDI\StatutEmpruntRepository;
use App\Form\CDI\StatutEmpruntType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/statutEmprunt', name: 'statutEmprunt_')]
class StatutEmpruntController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(StatutEmpruntRepository $statutEmpruntRepo): Response
    {
	
        return $this->render('CDI/statut_emprunt/index.html.twig', [
            'controller_name' => 'StatutEmpruntController',
		    'titre' => 'StatutEmprunt',
            'statutEmprunts' => $statutEmpruntRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $statutEmprunt = new StatutEmprunt();
        $form = $this->createForm(StatutEmpruntType::class, $statutEmprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($statutEmprunt);
            $this->entityManager->flush();

            return $this->redirectToRoute('statutEmprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/statut_emprunt/new.html.twig', [
            'statutEmprunt' => $statutEmprunt,
            'titre' => 'Nouvelle StatutEmprunt',
            'statutEmpruntForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(StatutEmprunt $statutEmprunt): Response
    {
        return $this->render('CDI/statut_emprunt/show.html.twig', [
            'statutEmprunt' => $statutEmprunt,
            'titre' => 'Affichage StatutEmprunt',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatutEmprunt $statutEmprunt): Response
    {
        $form = $this->createForm(statutEmpruntType::class, $statutEmprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('statutEmprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/statut_emprunt/edit.html.twig', [
            'statutEmprunt' => $statutEmprunt,
            'titre' => 'Edition StatutEmprunt',
            'statutEmpruntForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, StatutEmprunt $statutEmprunt): Response
    {
        if ($this->isCsrfTokenValid('delete' . $statutEmprunt->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($statutEmprunt);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('statutEmprunt_index', [], Response::HTTP_SEE_OTHER);
    }
}
