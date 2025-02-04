<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Dessert;
use App\Repository\DessertRepository;
use App\Form\DessertType;
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
	
        return $this->render('Dessert/index.html.twig', [
            'controller_name' => 'DessertController',
		    'titre' => 'Dessert',
            'desserts' => $dessertRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $dessert = new Dessert();
        $form = $this->createForm(DessertType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dessert);
            $entityManager->flush();

            return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dessert/new.html.twig', [
            'dessert' => $dessert,
            'dessertForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Dessert $dessert): Response
    {
        return $this->render('dessert/show.html.twig', [
            'dessert' => $dessert,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dessert $dessert, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(dessertType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dessert/edit.html.twig', [
            'dessert' => $dessert,
            'dessertForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Dessert $dessert, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dessert->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($dessert);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dessert_index', [], Response::HTTP_SEE_OTHER);
    }
}
