<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Legume;
use App\Repository\LegumeRepository;
use App\Form\LegumeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/legume', name: 'legume_')]
class LegumeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(LegumeRepository $legumeRepo): Response
    {
	
        return $this->render('Legume/index.html.twig', [
            'controller_name' => 'LegumeController',
		'legumes' => $legumeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $legume = new Legume();
        $form = $this->createForm(LegumeType::class, $legume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($legume);
            $entityManager->flush();

            return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('legume/new.html.twig', [
            'legume' => $legume,
            'legumeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Legume $legume): Response
    {
        return $this->render('legume/show.html.twig', [
            'legume' => $legume,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Legume $legume, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(legumeType::class, $legume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('legume/edit.html.twig', [
            'legume' => $legume,
            'legumeForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Legume $legume, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $legume->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($legume);
            $entityManager->flush();
        }

        return $this->redirectToRoute('legume_index', [], Response::HTTP_SEE_OTHER);
    }
}
