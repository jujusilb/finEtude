<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Repository\MembreRepository;

use App\Form\MembreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Attribute\Route;

#[Route('/membre', name: 'membre_')]
class MembreController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MembreRepository $membreRepo): Response
    {
        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membreRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Membre();
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membre->setCreatedAt(new \DateTimeImmutable()); // Set the createdAt field before persisting
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('membre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('membre/new.html.twig', [
            'membre' => $membre,
            'membreForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Membre $membre): Response
    {
        return $this->render('membre/show.html.twig', [
            'membre' => $membre,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('membre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('membre/edit.html.twig', [
            'membre' => $membre,
            'membreForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $membre->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($membre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('membre_index', [], Response::HTTP_SEE_OTHER);
    }
}
