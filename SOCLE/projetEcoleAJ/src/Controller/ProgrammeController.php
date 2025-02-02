<?php

namespace App\Controller;

use App\Outils\CouteauSuisse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Programme;
use App\Repository\ProgrammeRepository;
use App\Repository\PromotionRepository;
use App\Repository\ProfesseurMatiereRepository;
use App\Repository\MatiereRepository;
use App\Form\ProgrammeType;
use App\Repository\ProfesseurRepository;
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
        $r=["klmqjdlmsdg", "qdlmsfjld", ["qmsdjfùq", "mqsdklfjmlq"], "qsdfjql"];
        $debug= new CouteauSuisse();
        $debug->debug($r, "r");
        
        return $this->render('programme/index.html.twig', [
            'controller_name' => 'ProgrammeController',
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
            'programmeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Programme $programme): Response
    {
        return $this->render('programme/show.html.twig', [
            'programme' => $programme,
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
