<?php

namespace App\Controller;

use App\Entity\Cuisine;
use App\Form\CuisineType;
use App\Repository\CuisineRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cuisine', name: 'cuisine_')]
class CuisineController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(cuisineRepository $cuisineRepo): Response
    {
        return $this->render('cuisine/index.html.twig', [
            'controller_name' => 'cuisineController',
            'cuisines' => $cuisineRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $cuisine = new Cuisine();
        $form = $this->createForm(CuisineType::class, $cuisine);
        $form->handleRequest($request);

        if ($cuisine->getCreatedAt() === null) {
            $cuisine->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $cuisine->setRoles(["ROLE_CUISINE"]);
            $entityManager->persist($cuisine);
            $entityManager->flush();

            return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/new.html.twig', [
            'cuisine' => $cuisine,
            'cuisineForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Cuisine $cuisine): Response
    {
        return $this->render('cuisine/show.html.twig', [
            'cuisine' => $cuisine,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cuisine $cuisine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CuisineType::class, $cuisine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/edit.html.twig', [
            'cuisine' => $cuisine,
            'cuisineForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Cuisine $cuisine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cuisine->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cuisine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
    }
}
