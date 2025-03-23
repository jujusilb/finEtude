<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Viande;
use App\Repository\Cantine\ViandeRepository;
use App\Form\Cantine\ViandeType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/viande', name: 'viande_')]
class ViandeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ViandeRepository $viandeRepo): Response
    {
	
        return $this->render('cantine/viande/index.html.twig', [
            'controller_name' => 'ViandeController',
		    'titre' => 'Viande',
            'viandes' => $viandeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $viande = new Viande();
        $form = $this->createForm(ViandeType::class, $viande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($viande);
            $entityManager->flush();

            return $this->redirectToRoute('viande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/viande/new.html.twig', [
            'viande' => $viande,
            'titre' => 'Nouvelle Viande',
            'viandeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Viande $viande): Response
    {
        return $this->render('cantine/viande/show.html.twig', [
            'viande' => $viande,
            'titre' => 'Affichage '.$viande->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Viande $viande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(viandeType::class, $viande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('viande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/viande/edit.html.twig', [
            'viande' => $viande,
            'titre' => 'Edition Viande',
            'viandeForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Viande $viande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $viande->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($viande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('viande_index', [], Response::HTTP_SEE_OTHER);
    }
}
