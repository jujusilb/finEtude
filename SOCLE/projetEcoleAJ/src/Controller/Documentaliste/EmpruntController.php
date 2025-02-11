<?php

namespace App\Controller\Documentaliste;

use App\Entity\Documentaliste\Emprunt;

use App\Repository\Documentaliste\EmpruntRepository;
use App\Form\Documentaliste\EmpruntType;
use App\Repository\Utilisateur\MembreRepository;
use App\Repository\Documentaliste\OuvrageRepository;

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
        return $this->render('documentaliste/emprunt/index.html.twig', [
            'controller_name' => 'EmpruntController',
            'titre' => 'Emprunt',
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
            $user=$this->getUser();
            $emprunt->setMembre($user);
            $entityManager->persist($emprunt);
            $entityManager->flush();

            return $this->redirectToRoute('emprunt_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('documentaliste/emprunt/new.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Nouvel Emprunt',
            'empruntForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Emprunt $emprunt): Response
    {
        return $this->render('documentaliste/emprunt/show.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Affichage Emprunt',
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

        return $this->render('documentaliste/emprunt/edit.html.twig', [
            'emprunt' => $emprunt,
            'titre' => 'Edition Emprunt',
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
