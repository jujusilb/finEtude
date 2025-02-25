<?php

namespace App\Controller\Etablissement;

use App\Entity\Etablissement\Batiment;
use App\Repository\Etablissement\BatimentRepository;
use App\Form\Etablissement\BatimentType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/batiment', name: 'batiment_')]
class BatimentController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(BatimentRepository $batimentRepo): Response
    {
	
        return $this->render('etablissement/batiment/index.html.twig', [
            'controller_name' => 'BatimentController',
		    'titre' => 'Batiment',
            'batiments' => $batimentRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $batiment = new Batiment();
        $form = $this->createForm(BatimentType::class, $batiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($batiment);
            $entityManager->flush();

            return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/batiment/new.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Nouvelle Batiment',
            'batimentForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Batiment $batiment): Response
    {
        return $this->render('etablissement/batiment/show.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Affichage Batiment',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Batiment $batiment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(batimentType::class, $batiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/batiment/edit.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Edition Batiment',
            'batimentForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Batiment $batiment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $batiment->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($batiment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
    }
}
