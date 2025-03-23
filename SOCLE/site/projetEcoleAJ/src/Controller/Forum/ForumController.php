<?php

namespace App\Controller\Forum;

use App\Entity\Utilisateur\Membre;
use App\Entity\Forum\Forum;
use App\Form\Forum\ForumType;
use App\Entity\Forum\Categorie;
use App\Repository\Forum\ForumRepository;
use App\Repository\Forum\CategorieForumRepository;
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
    
    
    #[Route('/index', name: 'index')]
    public function index(forumRepository $forumRepo)
    {
        $user=$this->getUser();
        if ($user instanceof Membre){
            $charte=$user->isCharte();
            if(!$charte){
                return $this->redirectToRoute('forum_charte');
            } else {
                $userRoles = $user->getRoles();
                $allForums = $forumRepo->findAll();
                $accessibleForums = [];

                foreach ($allForums as $forum) {
                    $forumRoles = $forum->getRole();
                    foreach($userRoles as $key){
                        if (array_intersect($userRoles, $forumRoles)) {
                            $accessibleForums[] = $forum;
                            break;
                        }
                    }

                }
                return $this->render('forum/forum/index.html.twig', [
                    'controller_name' => 'forumController',
                    'titre' => 'Forum',
                    'forums' => $accessibleForums,
                    'reponse' => 'charte acceptée!',
                ]);
            }
        } return $this->redirectToRoute('root_accueil');
    }
    

    #[Route('/charte', name: 'charte')]
    public function charte(EntityManagerInterface $entityManager, MembreRepository $membreRepo, Request $request, ForumRepository $forumRepo,  MembreRepository $userRepo): Response
    {
        $reponse="let's decide";
        $user=$this->getUser();
        if ($user instanceof Membre){
            $charte= $user->isCharte();
                if ($charte) {
                    $reponse="instance of membre et isCharte true";
                    return $this->redirectToRoute('forum_index');
                }
                else {
                    $reponse="NOPE !, la clé charte est toujours a false";
                    $form = $this->createFormBuilder()
                    ->add('charte', ChoiceType::class, [
                        'choices' => [
                            'Oui' => true,
                            'Non' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'data' => $user ? $user->isCharte() ?? false : false,
                    ])
                    ->getForm();

                    $form->handleRequest($request);
                    if ($form->isSubmitted() && $form->isValid()) {
                        if ($user) {
                            $user->setCharte($form->get('charte')->getData()); 
                            $entityManager->persist($user);
                            $entityManager->flush();
                        }
                        if ($charte===true) {
                            return $this->redirectToRoute('forum_index');
                        }
                        return $this->redirectToRoute('forum_charte', [], Response::HTTP_SEE_OTHER);
                    }
                    return $this->render('forum/forum/charte.html.twig', [
                        'controller_name' => 'forumController',
                        'titre' => 'Signez la charte',
                        'form' => $form->createView(),
                        "reponse" =>$reponse
                    ]);
                }
            } else {
            $reponse ="tout a foiré";
            return $this->render('forum/forum/index.html.twig', [
                'controller_name' => 'forumController',
                'titre' => 'Forum',
                'forums' => $forumRepo->findAll(),
                //'form' => $form->createView()
                'reponse' =>$reponse,
            ]);
        }
        echo "DESOLE !";
        
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

        return $this->render('forum/forum/new.html.twig', [
            'forum' => $forum,
            'titre' => 'Nouveau Forum',
            'forumForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Forum $forum, CategorieForumRepository $categorieForumRepo): Response
    {
        $categorie=$categorieForumRepo->findBy(['forum'=>$forum]);
        return $this->render('forum/forum/show.html.twig', [
            'forum' => $forum,
            'titre' => 'Affichage '.$forum->getLibelle(),
            'categories'=>$categorie,
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

        return $this->render('forum/forum/edit.html.twig', [
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
