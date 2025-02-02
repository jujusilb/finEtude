<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Entree;
use App\Repository\EntreeRepository;
use App\Form\EntreeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/entree', name: 'entree_')]
class EntreeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(EntreeRepository $entreeRepo): Response
    {
	
        return $this->render('Entree/index.html.twig', [
            'controller_name' => 'EntreeController',
		'entrees' => $entreeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $entree = new Entree();
        $form = $this->createForm(EntreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entree);
            $entityManager->flush();

            return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entree/new.html.twig', [
            'entree' => $entree,
            'entreeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Entree $entree): Response
    {
        return $this->render('entree/show.html.twig', [
            'entree' => $entree,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entree $entree, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(entreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entree/edit.html.twig', [
            'entree' => $entree,
            'entreeForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Entree $entree, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $entree->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($entree);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
    }
}
