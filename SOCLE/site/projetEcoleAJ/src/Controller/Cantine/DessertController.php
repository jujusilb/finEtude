<?php

namespace App\Controller\Cantine;


use App\Entity\Cantine\Dessert;
use App\Repository\Cantine\DessertRepository;
use App\Form\Cantine\DessertType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dessert', name: 'dessert_')]
class DessertController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(DessertRepository $dessertRepo): Response
    {
	
        return $this->render('cantine/Dessert/index.html.twig', [
            'controller_name' => 'DessertController',
		    'titre' => 'Dessert',
            'desserts' => $dessertRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $dessert = new Dessert();
        $form = $this->createForm(DessertType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($dessert);
            $this->entityManager->flush();

            return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/dessert/new.html.twig', [
            'dessert' => $dessert,
            'titre' => 'Nouveau Dessert',
            'dessertForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Dessert $dessert): Response
    {
        return $this->render('cantine/dessert/show.html.twig', [
            'dessert' => $dessert,
            'titre' => 'Affichage '. $dessert->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dessert $dessert): Response
    {
        $form = $this->createForm(dessertType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/dessert/edit.html.twig', [
            'dessert' => $dessert,
            'titre' => 'Edition Dessert',
            'dessertForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Dessert $dessert): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dessert->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($dessert);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
    }


    
}
