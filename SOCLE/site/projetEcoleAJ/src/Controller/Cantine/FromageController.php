<?php

namespace App\Controller\Cantine;


use App\Entity\Cantine\Fromage;
use App\Repository\Cantine\FromageRepository;
use App\Form\Cantine\FromageType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fromage', name: 'fromage_')]
class FromageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(FromageRepository $fromageRepo): Response
    {
	
        return $this->render('cantine/fromage/index.html.twig', [
            'controller_name' => 'FromageController',
		    'titre' => 'Fromage',
            'fromages' => $fromageRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $fromage = new Fromage();
        $form = $this->createForm(FromageType::class, $fromage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fromage);
            $entityManager->flush();

            return $this->redirectToRoute('fromage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/fromage/new.html.twig', [
            'fromage' => $fromage,
            'titre' => 'Nouveau Fromage',
            'fromageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Fromage $fromage): Response
    {
        return $this->render('cantine/fromage/show.html.twig', [
            'fromage' => $fromage,
            'titre' => 'Affichage '.$fromage->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fromage $fromage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(fromageType::class, $fromage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fromage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/fromage/edit.html.twig', [
            'fromage' => $fromage,
            'titre' => 'Edition Fromage',
            'fromageForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Fromage $fromage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fromage->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fromage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fromage_index', [], Response::HTTP_SEE_OTHER);
    }
}
