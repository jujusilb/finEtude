<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Repository\MatiereRepository;
use App\Form\MatiereType;
use App\Repository\ProfesseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/matiere', name: 'matiere_')]
class MatiereController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        MatiereRepository $matiereRepo, 
        ProfesseurRepository $professeurRepo
    ): Response
    {
	
        return $this->render('Matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
		    'matieres' => $matiereRepo->findAll(),
            'professeurs' =>$professeurRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $matiere = new Matiere();
        $form = $this->createForm(MatiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($matiere);
            $entityManager->flush();

            return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('matiere/new.html.twig', [
            'matiere' => $matiere,
            'matiereForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Matiere $matiere): Response
    {
        return $this->render('matiere/show.html.twig', [
            'matiere' => $matiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Matiere $matiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(matiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('matiere/edit.html.twig', [
            'matiere' => $matiere,
            'matiereForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Matiere $matiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $matiere->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($matiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
