<?php

namespace App\Controller;

use App\Entity\Emprunt;

use App\Repository\EmpruntRepository;
use App\Form\EmpruntType;
use App\Repository\MembreRepository;
use App\Repository\OuvrageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/emprunt', name: 'emprunt_')]
class EmpruntController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        EmpruntRepository $empruntRepo, 
        MembreRepository $membreRepo, 
        OuvrageRepository $ouvrageRepo
    ): Response
    {
        return $this->render('emprunt/index.html.twig', [
            'controller_name' => 'EmpruntController',
            'emprunts' => $empruntRepo->findAll(),
            'membre' => $membreRepo->findAll(),
            'ouvrage' => $ouvrageRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $emprunt = new Emprunt();
        $form = $this->createForm(EmpruntType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($emprunt);
            $entityManager->flush();

            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('emprunt/new.html.twig', [
            'emprunt' => $emprunt,
            'empruntForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Emprunt $emprunt): Response
    {
        return $this->render('emprunt/show.html.twig', [
            'emprunt' => $emprunt,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Emprunt $emprunt, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(empruntType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('emprunt/edit.html.twig', [
            'emprunt' => $emprunt,
            'empruntForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Emprunt $emprunt, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $emprunt->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($emprunt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
    }
}
