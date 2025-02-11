<?php

namespace App\Controller\Cuisine;

use App\Entity\Cuisine\Repas;
use App\Repository\Cuisine\RepasRepository;
use App\Form\Cuisine\RepasType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/repas', name: 'repas_')]
class RepasController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(RepasRepository $repasRepo): Response
    {
	
        return $this->render('Repas/index.html.twig', [
            'controller_name' => 'RepasController',
            'titre' =>'Repas',
            'repass' => $repasRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $repas = new Repas();
        $form = $this->createForm(RepasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repas->setDateAchat(new \DateTime());
            $entityManager->persist($repas);
            $entityManager->flush();

            return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/repas/new.html.twig', [
            'repas' => $repas,
            'titre' => 'Nouveau Repas',
            'repasForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Repas $repas): Response
    {
        return $this->render('cuisine/repas/show.html.twig', [
            'repas' => $repas,
            'titre' =>'Affichage Repas',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Repas $repas, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(repasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/repas/edit.html.twig', [
            'repas' => $repas,
            'titre' =>'Edition Repas',
            'repasForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Repas $repas, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $repas->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($repas);
            $entityManager->flush();
        }

        return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
    }
}
