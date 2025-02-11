<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Eleve;
use App\Repository\Utilisateur\EleveRepository;
use App\Form\Utilisateur\EleveType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/eleve', name: 'eleve_')]
class EleveController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(EleveRepository $eleveRepo): Response
    {
	
        return $this->render('Utilisateur/eleve/index.html.twig', [
            'controller_name' => 'EleveController',
		    'titre' => 'Eleve',
            'eleves' => $eleveRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $eleve = new Eleve();
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eleve->setRoles(["ROLE_ELEVE"]);
            $promotion = $eleve->getPromotion();
            if ($promotion) {
                $rolePromotion = 'ROLE_' . strtoupper($promotion->getLibelle());
                $eleve->setRoles(array_merge($eleve->getRoles(), [$rolePromotion]));
            }
            $entityManager->persist($eleve);
            $entityManager->flush();
            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/eleve/new.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Nouvel Élève',
            'eleveForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Eleve $eleve): Response
    {
        return $this->render('Utilisateur/eleve/show.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Affichage Documentaliste',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, eleve $eleve, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eleve->setRoles(["ROLE_ELEVE"]);
            $promotion = $eleve->getPromotion();
            if ($promotion) {
                $rolePromotion = 'ROLE_' . strtoupper($promotion->getLibelle());
                $eleve->setRoles(array_merge($eleve->getRoles(), [$rolePromotion]));
            }
            $entityManager->flush();
            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/eleve/edit.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Edition Documentaliste',
            'eleveForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Eleve $eleve, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $eleve->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($eleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
