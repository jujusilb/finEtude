<?php

namespace App\Controller;

use App\Entity\Direction;
use App\Repository\DirectionRepository;
use App\Form\DirectionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/direction', name: 'direction_')]
class DirectionController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(directionRepository $directionRepo): Response
    {
        return $this->render('direction/index.html.twig', [
            'controller_name' => 'directionController',
            'directions' => $directionRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $direction = new Direction();
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($direction->getCreatedAt() === null) {
            $direction->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $direction->setRoles(["ROLE_DIRECTION"]);
            $entityManager->persist($direction);
            $entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('direction/new.html.twig', [
            'direction' => $direction,
            'directionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Direction $direction): Response
    {
        return $this->render('direction/show.html.twig', [
            'direction' => $direction,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Direction $direction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('direction/edit.html.twig', [
            'direction' => $direction,
            'directionForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Direction $direction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $direction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($direction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
    }
}
