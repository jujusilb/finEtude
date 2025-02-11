<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\Referent;
use App\Repository\Pedagogie\ReferentRepository;
use App\Form\Pedagogie\ReferentType;
use App\Entity\Utilisateur\Membre;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Attribute\Route;

#[Route('/referent', name: 'referent_')]
class ReferentController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ReferentRepository $referentRepo): Response
    {
	
        return $this->render('pedagogie/referent/index.html.twig', [
            'controller_name' => 'ReferentController',
		    'titre' => 'Referent',
            'referents' => $referentRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $referent = new Referent();
        $form = $this->createForm(ReferentType::class, $referent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($referent);
            $entityManager->flush();

            return $this->redirectToRoute('referent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/referent/new.html.twig', [
            'referent' => $referent,
            'titre' => 'Nouveau Referent',
            'referentForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Referent $referent): Response
    {
        return $this->render('pedagogie/referent/show.html.twig', [
            'referent' => $referent,
            'titre' => 'Affichage Referent',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Referent $referent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReferentType::class, $referent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('referent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/referent/edit.html.twig', [
            'referent' => $referent,
            'titre' => 'Edition Referent',
            'referentForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Referent $referent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $referent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($referent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('referent_index', [], Response::HTTP_SEE_OTHER);
    }
}
