<?php

namespace App\Controller\Pedagogie;

use App\Outils\CouteauSuisse;
use App\Entity\Pedagogie\Programme;
use App\Repository\Pedagogie\ProgrammeRepository;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Pedagogie\ProfesseurMatiereRepository;
use App\Repository\Pedagogie\MatiereRepository;
use App\Form\Pedagogie\ProgrammeType;
use App\Repository\Utilisateur\ProfesseurRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/programme', name: 'programme_')]
class ProgrammeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ProgrammeRepository $programmeRepo,
                        PromotionRepository $promotionRepo,
                        ProfesseurRepository $professeurRepo,
                        MatiereRepository $matiereRepo): Response
    {   

        return $this->render('programme/index.html.twig', [
            'controller_name' => 'ProgrammeController',
            'titre' => 'Programme',
            'programmes' => $programmeRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'matieres' => $matiereRepo ->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $programme = new Programme();
        $form = $this->createForm(ProgrammeType::class, $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($programme);
            $entityManager->flush();

            return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('programme/new.html.twig', [
            'programme' => $programme,
            'titre' => 'Nouveau Programme',
            'programmeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Programme $programme): Response
    {
        return $this->render('programme/show.html.twig', [
            'programme' => $programme,
            'titre' => 'Affichage Programme',
            
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Programme $programme, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProgrammeType::class, $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('programme/edit.html.twig', [
            'programme' => $programme,
            'titre' => 'Edition Programme',
            'programmeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Programme $programme, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $programme->getId(), $request->request->get('_token'))) {
            $entityManager->remove($programme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/tableau', name: 'tableau')]
    public function tabeau(ProgrammeRepository $programmeRepo,
                        PromotionRepository $promotionRepo,
                        ProfesseurRepository $professeurRepo,
                        MatiereRepository $matiereRepo): Response
    {
        return $this->render('programme/tableau.html.twig', [
            'controller_name' => 'ProgrammeController',
            'programmes' => $programmeRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'matieres' => $matiereRepo ->findAll(),
        ]);
    }

}
