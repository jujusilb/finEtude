<?php

namespace App\Controller\Pedagogie;;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pedagogie\Cours;
use App\Repository\Pedagogie\CoursRepository;
use App\Form\Pedagogie\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours', name: 'cours_')]
class CoursController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(CoursRepository $coursRepo): Response
    {
	
        return $this->render('Pedagogie/Cours/index.html.twig', [
            'controller_name' => 'CoursController',
		    'titre' => 'Cours',
            'courss' => $coursRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $cours = new Cours();
        $form = $this->createForm(CoursType::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cours);
            $entityManager->flush();

            return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/cours/new.html.twig', [
            'cours' => $cours,
            'titre' => 'Nouvelle Cours',
            'coursForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Cours $cours): Response
    {
        return $this->render('cuisine/cours/show.html.twig', [
            'cours' => $cours,
            'titre' => 'Affichage Cours',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cours $cours, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(coursType::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/cours/edit.html.twig', [
            'cours' => $cours,
            'titre' => 'Edition Cours',
            'coursForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Cours $cours, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cours->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cours);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
    }

}
