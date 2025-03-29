<?php

namespace App\Controller\Etablissement;

use App\Entity\Etablissement\Pole;
use App\Repository\Etablissement\PoleRepository;
use App\Form\Etablissement\PoleType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pole', name: 'pole_')]
class PoleController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(PoleRepository $poleRepo): Response
    {
	
        return $this->render('etablissement/pole/index.html.twig', [
            'controller_name' => 'PoleController',
		    'titre' => 'Pole',
            'poles' => $poleRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $pole = new Pole();
        $form = $this->createForm(PoleType::class, $pole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($pole);
            $this->entityManager->flush();

            return $this->redirectToRoute('pole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/pole/new.html.twig', [
            'pole' => $pole,
            'titre' => 'Nouvelle Pole',
            'poleForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Pole $pole): Response
    {
        return $this->render('etablissement/pole/show.html.twig', [
            'pole' => $pole,
            'titre' => 'Affichage Pole',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pole $pole): Response
    {
        $form = $this->createForm(poleType::class, $pole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('pole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/pole/edit.html.twig', [
            'pole' => $pole,
            'titre' => 'Edition Pole',
            'poleForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Pole $pole): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pole->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($pole);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('pole_index', [], Response::HTTP_SEE_OTHER);
    }
}
