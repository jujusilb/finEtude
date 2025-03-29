<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Repas;
use App\Repository\Cantine\RepasRepository;
use App\Form\Cantine\RepasType;

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
        
        return $this->render('cantine/repas/index.html.twig', [
            'controller_name' => 'RepasController',
            'titre' =>'Repas',
            'repass' => $repasRepo->findAll(),
        ]);
    }

    #[Route('/listeRepas', name: 'listeRepas')]
    public function listeRepas(RepasRepository $repasRepo): Response
    {
        
        return $this->render('cantine/repas/listeRepas.html.twig', [
            'controller_name' => 'RepasController',
            'titre' =>'Liste repas',
            'repass' => $repasRepo->findAll(),
        ]);
    }
    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $repas = new Repas();
        $form = $this->createForm(RepasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($repas);
            $this->entityManager->flush();

            return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/repas/new.html.twig', [
            'repas' => $repas,
            'titre' => 'Nouveau Repas',
            'repasForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Repas $repas): Response
    {
        return $this->render('cantine/repas/show.html.twig', [
            'repas' => $repas,
            'titre' =>'Affichage Repas',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Repas $repas): Response
    {
        $form = $this->createForm(repasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/repas/edit.html.twig', [
            'repas' => $repas,
            'titre' =>'Edition Repas',
            'repasForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Repas $repas): Response
    {
        if ($this->isCsrfTokenValid('delete' . $repas->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($repas);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('repas_index', [], Response::HTTP_SEE_OTHER);
    }
}
