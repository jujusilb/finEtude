<?php

namespace App\Controller\Forum;

use App\Entity\Utilisateur\Membre;
use App\Entity\Forum\Forum;
use App\Form\Forum\ForumType;
use App\Entity\Forum\Categorie;
use App\Repository\Forum\ForumRepository;
use App\Repository\Utilisateur\MembreRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/forum', name: 'forum_')]
class ForumController extends AbstractController
{
    /*
    #[Route('/index', name: 'index')]
    public function index(forumRepository $forumRepo): Response
    {
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'forumController',
            'titre' => 'Forum',
            'forums' => $forumRepo->findAll(),
        ]);
    }
    */

    #[Route('/index', name: 'index')]
    public function index(EntityManagerInterface $entityManager, MembreRepository $membreRepo, Request $request, forumRepository $forumRepo, MembreRepository $userRepo): Response
    {
        $login=$this->getUser();
        if ($login && $login->isCharte() === true) {
            $this->redirectToRoute('categorie_index');
        }
        $form = $this->createFormBuilder()
            ->add('charte', ChoiceType::class, [
                'choices' => [
                    'Accepter la charte' => true,
                    'Refuser la charte' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'data' => false,
            ])
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->isSubmitted() && $form->isValid()) {
                $user = $this->getUser();
                
                if ($user) {
                    $entityManager->persist($user);
                    $entityManager->flush();
                }
                /*if ($charteAccepted) {
                    return $this->redirectToRoute('categorie_index');
                }*/
                return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
            }
        }
            return $this->render('forum/index.html.twig', [
                'controller_name' => 'forumController',
                'titre' => 'Forum',
                'forums' => $forumRepo->findAll(),
                'form' => $form->createView(),
            ]);
        }
    

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $forum = new Forum();
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

       
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($forum);
            $entityManager->flush();

            return $this->redirectToRoute('forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/new.html.twig', [
            'forum' => $forum,
            'titre' => 'Nouveau Forum',
            'forumForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Forum $forum): Response
    {
        return $this->render('forum/show.html.twig', [
            'forum' => $forum,
            'titre' => 'Affichage Forum',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Forum $forum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/edit.html.twig', [
            'forum' => $forum,
            'titre' => 'Edition Forum',
            'forumForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Forum $forum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $forum->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($forum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('forum_index', [], Response::HTTP_SEE_OTHER);
    }
}
