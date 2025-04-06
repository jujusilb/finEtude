<?php

namespace App\Controller\Forum;

use App\Entity\Forum\CategorieForum;
use App\Form\Forum\CategorieForumType;
use App\Repository\Forum\CategorieForumRepository;
use App\Repository\Forum\SubForumRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorieForum', name: 'categorieForum_')]
class CategorieForumController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(CategorieForumRepository $categorieForumRepo): Response
    {
        return $this->render('forum/categorie_forum/index.html.twig', [
            'controller_name' => 'categorieForumController',
            'titre' => 'CategorieForum',
            'categorieForums' => $categorieForumRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $categorieForum = new CategorieForum();
        $form = $this->createForm(CategorieForumType::class, $categorieForum);
        $form->handleRequest($request);

       
        
        if ($form->isSubmitted() && $form->isValid()) {
           $this->entityManager->persist($categorieForum);
           $this->entityManager->flush();

            return $this->redirectToRoute('categorieForum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/categorie_forum/new.html.twig', [
            'Forum' => $categorieForum,
            'titre' => 'Nouveau CategorieForum',
            'categorieForumForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(SubForumRepository $subForumRepo, CategorieForum $categorieForum): Response
    {
        $subForum=$subForumRepo->findBy(['categorieForum'=>$categorieForum]);
        //dd($subForum);
        return $this->render('forum/categorie_forum/show.html.twig', [
            'categorieForum' => $categorieForum,
            'titre' => 'Affichage CategorieForum',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieForum $categorieForum): Response
    {
        $form = $this->createForm(CategorieForumType::class, $categorieForum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('categorieForum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('forum/categorie_forum/edit.html.twig', [
            'categorieForum' => $categorieForum,
            'titre' => 'Edition CategorieForum',
            'categorieForumForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, CategorieForum $categorieForum): Response
    {
        if ($this->isCsrfTokenValid('delete' . $categorieForum->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($categorieForum);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('categorieForum_index', [], Response::HTTP_SEE_OTHER);
    }
}
