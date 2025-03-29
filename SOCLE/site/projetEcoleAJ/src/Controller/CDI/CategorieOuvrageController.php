<?php

namespace App\Controller\CDI;

use App\Entity\CDI\CategorieOuvrage;
use App\Repository\CDI\CategorieOuvrageRepository;
use App\Form\CDI\CategorieOuvrageType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorieOuvrage', name: 'categorieOuvrage_')]
class CategorieOuvrageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(CategorieOuvrageRepository $categorieOuvrageRepo): Response
    {
	
        return $this->render('CDI/Categorie_ouvrage/index.html.twig', [
            'controller_name' => 'CategorieOuvrageController',
		    'titre' => 'CategorieOuvrage',
            'categorieOuvrages' => $categorieOuvrageRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $categorieOuvrage = new CategorieOuvrage();
        $form = $this->createForm(CategorieOuvrageType::class, $categorieOuvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($categorieOuvrage);
            $this->entityManager->flush();

            return $this->redirectToRoute('categorieOuvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/categorie_ouvrage/new.html.twig', [
            'categorieOuvrage' => $categorieOuvrage,
            'titre' => 'Nouvelle Categorie',
            'categorieOuvrageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(CategorieOuvrage $categorieOuvrage): Response
    {
        return $this->render('CDI/categorie_ouvrage/show.html.twig', [
            'categorieOuvrage' => $categorieOuvrage,
            'titre' => 'Affichage des Categories',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieOuvrage $categorieOuvrage): Response
    {
        $form = $this->createForm(categorieOuvrageType::class, $categorieOuvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('categorieOuvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/categorie_ouvrage/edit.html.twig', [
            'categorieOuvrage' => $categorieOuvrage,
            'titre' => 'Edition des Categories',
            'categorieOuvrageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, CategorieOuvrage $categorieOuvrage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $categorieOuvrage->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($categorieOuvrage);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('categorieOuvrage_index', [], Response::HTTP_SEE_OTHER);
    }
}
