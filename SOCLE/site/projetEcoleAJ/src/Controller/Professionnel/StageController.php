<?php

namespace App\Controller\Professionnel;

use App\Entity\Professionnel\Stage;
use App\Repository\Professionnel\StageRepository;
use App\Form\Professionnel\StageType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/stage', name: 'stage_')]
class StageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(StageRepository $stageRepo): Response
    {
	
        return $this->render('professionnel/stage/index.html.twig', [
            'controller_name' => 'StageController',
		    'titre' => 'Stage',
            'stages' => $stageRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($stage);
            $this->entityManager->flush();

            return $this->redirectToRoute('stage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/stage/new.html.twig', [
            'stage' => $stage,
            'titre' => 'Nouvel Stage',
            'stageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Stage $stage): Response
    {
        return $this->render('professionnel/stage/show.html.twig', [
            'stage' => $stage,
            'titre' => 'Affichage Stage',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stage $stage): Response
    {
        $form = $this->createForm(stageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('stage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professionnel/stage/edit.html.twig', [
            'stage' => $stage,
            'titre' => 'Edition Stage',
            'stageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Stage $stage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $stage->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($stage);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('stage_index', [], Response::HTTP_SEE_OTHER);
    }


}
