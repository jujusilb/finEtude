<?php

namespace App\Controller;

use App\Form\PromotionType;
use App\Entity\Promotion;
use App\Entity\Referent;
use App\Entity\Professeur;
use App\Entity\ProfesseurMatiere;
use App\Repository\ProgrammeRepository;
use App\Repository\ReferentRepository;
use App\Repository\PromotionRepository;
use App\Repository\EleveRepository;
use App\Entity\Matiere;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/promotion', name: 'promotion_')]
class PromotionController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        EntityManagerInterface $entityManager, 
        PromotionRepository $promotionRepo, 
        EleveRepository $eleveRepo,
        ProgrammeRepository $programmeRepo): Response
    {
        return $this->render('Promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
            'titre' => 'Promotion',
            'promotions' => $promotionRepo->findAll(),
            'eleves' => $eleveRepo->findAll(),
            'programmes' =>$programmeRepo->findAll()
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $promotion = new Promotion();
        $form = $this->createForm(PromotionType::class, $promotion);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($promotion);
            $entityManager->flush();

            return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('promotion/new.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Nouveau Promotion',
            'promotionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Promotion $promotion, Referent $referent): Response
    {
        return $this->render('promotion/show.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Affichage Promotion',
            'referent' => $referent,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Promotion $promotion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PromotionType::class, $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('promotion/edit.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Edition Promotion',
            'promotionForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Promotion $promotion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $promotion->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($promotion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
    }
}
