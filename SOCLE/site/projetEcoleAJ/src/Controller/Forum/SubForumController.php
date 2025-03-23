<?php

namespace App\Controller\Forum;

use App\Entity\Forum\SubForum;
use App\Form\Forum\SubForumType;
use App\Repository\Forum\SubForumRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/subForum', name: 'subForum_')]
class SubForumController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(subForumRepository $subForumRepo): Response
    {
        return $this->render('forum/sub_forum/index.html.twig', [
            'controller_name' => 'subForumController',
            'titre' => 'SubForum',
            'subForums' => $subForumRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $subForum = new SubForum();
        $form = $this->createForm(SubForumType::class, $subForum);
        $form->handleRequest($request);

        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($subForum);
            $entityManager->flush();

            return $this->redirectToRoute('subForum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/sub_forum/new.html.twig', [
            'subForum' => $subForum,
            'titre' => 'Nouveau SubForum',
            'subForumForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(SubForum $subForum): Response
    {
        return $this->render('forum/sub_forum/show.html.twig', [
            'subForum' => $subForum,
            'titre' => 'Affichage SubForum',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, SubForum $subForum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SubForumType::class, $subForum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('subForum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/sub_forum/edit.html.twig', [
            'subForum' => $subForum,
            'titre' => 'Edition SubForum',
            'subForumForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, SubForum $subForum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $subForum->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($subForum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subForum_index', [], Response::HTTP_SEE_OTHER);
    }
}
