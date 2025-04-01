<?php

namespace App\Controller\CDI;

use App\Entity\CDI\StatutOuvrage;
use App\Repository\CDI\StatutOuvrageRepository;
use App\Form\CDI\StatutOuvrageType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/statutOuvrage', name: 'statutOuvrage_')]
class StatutOuvrageController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(StatutOuvrageRepository $statutOuvrageRepo): Response
    {
	
        return $this->render('CDI/statut_ouvrage/index.html.twig', [
            'controller_name' => 'StatutOuvrageController',
		    'titre' => 'StatutOuvrage',
            'statutOuvrages' => $statutOuvrageRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $statutOuvrage = new StatutOuvrage();
        $form = $this->createForm(StatutOuvrageType::class, $statutOuvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($statutOuvrage);
            $this->entityManager->flush();

            return $this->redirectToRoute('statutOuvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/statut_ouvrage/new.html.twig', [
            'statutOuvrage' => $statutOuvrage,
            'titre' => 'Nouvelle StatutOuvrage',
            'statutOuvrageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(StatutOuvrage $statutOuvrage): Response
    {
        return $this->render('CDI/statut_ouvrage/show.html.twig', [
            'statutOuvrage' => $statutOuvrage,
            'titre' => 'Affichage StatutOuvrage',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatutOuvrage $statutOuvrage): Response
    {
        $form = $this->createForm(statutOuvrageType::class, $statutOuvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('statutOuvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/statut_ouvrage/edit.html.twig', [
            'statutOuvrage' => $statutOuvrage,
            'titre' => 'Edition StatutOuvrage',
            'statutOuvrageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, StatutOuvrage $statutOuvrage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $statutOuvrage->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($statutOuvrage);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('statutOuvrage_index', [], Response::HTTP_SEE_OTHER);
    }
}
