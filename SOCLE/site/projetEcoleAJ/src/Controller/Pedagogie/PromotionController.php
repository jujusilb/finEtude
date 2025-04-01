<?php

namespace App\Controller\Pedagogie;

use App\Form\Pedagogie\PromotionType;
use App\Entity\Pedagogie\Promotion; 
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Repository\Pedagogie\ProgrammeRepository;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Utilisateur\EleveRepository;
use App\Entity\Pedagogie\Matiere;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/promotion', name: 'promotion_')]
class PromotionController extends AbstractController
{
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(
        PromotionRepository $promotionRepo, 
        EleveRepository $eleveRepo,
        ProgrammeRepository $programmeRepo): Response
    {
        return $this->render('pedagogie/promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
            'titre' => 'Promotion',
            'promotions' => $promotionRepo->findAll(),
            'eleves' => $eleveRepo->findAll(),
            'programmes' =>$programmeRepo->findAll()
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $promotion = new Promotion();
        $form = $this->createForm(PromotionType::class, $promotion);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($promotion);
            $this->entityManager->flush();

            return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/promotion/new.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Nouveau Promotion',
            'promotionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Promotion $promotion): Response
    {
        return $this->render('pedagogie/promotion/show.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Affichage '.$promotion->getLibelle(),
            
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Promotion $promotion): Response
    {
        $form = $this->createForm(PromotionType::class, $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/promotion/edit.html.twig', [
            'promotion' => $promotion,
            'titre' => 'Edition Promotion',
            'promotionForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Promotion $promotion): Response
    {
        if ($this->isCsrfTokenValid('delete' . $promotion->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($promotion);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('promotion_index', [], Response::HTTP_SEE_OTHER);
    }
}
