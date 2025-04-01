<?php

namespace App\Controller\CDI;

use App\Entity\CDI\Auteur;
use App\Repository\CDI\AuteurRepository;
use App\Form\CDI\AuteurType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auteur', name: 'auteur_')]
class AuteurController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(AuteurRepository $auteurRepo): Response
    {
	
        return $this->render('CDI/auteur/index.html.twig', [
            'controller_name' => 'AuteurController',
		    'titre' => 'Auteur',
            'auteurs' => $auteurRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($auteur);
            $this->entityManager->flush();

            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/auteur/new.html.twig', [
            'auteurs' => $auteur,
            'titre' => 'Nouvel auteur',
            'auteurForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Auteur $auteur): Response
    {
        return $this->render('CDI/auteur/show.html.twig', [
            'auteur' => $auteur,
            'titre' => 'Affichage Auteur',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auteur $auteur): Response
    {
        $form = $this->createForm(auteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/auteur/edit.html.twig', [
            'auteur' => $auteur,
            'titre' => 'Edition des Categories',
            'auteurForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Auteur $auteur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $auteur->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($auteur);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
