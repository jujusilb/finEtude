<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Surveillant;
use App\Repository\Utilisateur\SurveillantRepository;
use App\Form\Utilisateur\SurveillantType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;


#[Route('/surveillant', name: 'surveillant_')]
class SurveillantController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(SurveillantRepository $surveillantRepo): Response
    {
        return $this->render('surveillant/index.html.twig', [
            'controller_name' => 'SurveillantController',
            'titre' => 'Surveillant',
            'surveillants' => $surveillantRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $surveillant = new Surveillant();
        $form = $this->createForm(SurveillantType::class, $surveillant);
        $form->handleRequest($request);

        if ($surveillant->getCreatedAt() === null) {
            $surveillant->setCreatedAt(new \DateTimeImmutable());
        }
        else {
            $surveillant->setUpdatedAt(new \DateTimeImmutable());
        }
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $surveillant->setRoles(["ROLE_SURVEILLANT"]);
            $entityManager->persist($surveillant);
            $entityManager->flush();
            return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('surveillant/new.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Nouveau Surveillant',
            'surveillantForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Surveillant $surveillant): Response
    {
        return $this->render('surveillant/show.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Affichage Surveillant',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Surveillant $surveillant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SurveillantType::class, $surveillant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('surveillant/edit.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Edition Surveillant',
            'surveillantForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Surveillant $surveillant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $surveillant->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($surveillant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
    }
}
