<?php

namespace App\Controller\Pedagogie;;

use App\Entity\Utilisateur\Membre;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\Professeur;
use App\Repository\Utilisateur\MembreRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pedagogie\Cours;
use App\Repository\Pedagogie\CoursRepository;
use App\Form\Pedagogie\CoursType;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/cours', name: 'cours_')]
class CoursController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(CoursRepository $coursRepo): Response
    {
	
        return $this->render('Pedagogie/Cours/index.html.twig', [
            'controller_name' => 'CoursController',
		    'titre' => 'Cours',
            'courss' => $coursRepo->findAll(),
        ]);
    }

    #[Route('/matiere/{matiere}', name: 'matiere', methods:['GET'])]
    public function listePromotion(CoursRepository $coursRepo, $matiere): Response
    {
        $user=$this->getUser();
        if($user instanceof Eleve){
             $cours=$coursRepo->getCoursByPromotionAndMatiere($user->getPromotion(), $matiere);
        }
       
        return $this->render('Pedagogie/Cours/matiere.html.twig', [
            'controller_name' => 'CoursController',
		    'titre' => 'Cours',
            'courss' => $cours,
        ]);
    }
    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (MembreRepository $membreRepo, Request $request): Response
    {
       $user=$this->getUser();
       if($user instanceof Professeur){
            $cours = new Cours();
            $form = $this->createForm(CoursType::class, $cours);
            $form->handleRequest($request);
            if ($form->isSubmitted()){
                $prof=$this->getUser();
                $cours->setProfesseur($prof);
                $file = $form->get('file')->getData();
                if ($file) {
                    $filename = uniqid() . '.' . $file->guessExtension();
                    try {
                        $file->move(
                            $this->getParameter('uploads_directory'),
                            $filename
                        );
                        $cours->setFichier($filename);
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Erreur lors du téléchargement du fichier.');
                    }
                }
                            $this->entityManager->persist($cours);
            $this->entityManager->flush();
            return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
            }

           
            return $this->render('pedagogie/cours/new.html.twig', [
                'cours' => $cours,
                'titre' => 'Nouveau Cours',
                'coursForm' => $form->createView(),
            ]);
        } else return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Cours $cours): Response
    {
        return $this->render('pedagogie/cours/show.html.twig', [
            'cours' => $cours,
            'titre' => 'Affichage Cours',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cours $cours): Response
    {
        $form = $this->createForm(coursType::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prof=$this->getUser();
            $cours->setProfesseur($prof);
            $file = $form->get('file')->getData();
                        
            if ($file) {
                $filename = uniqid() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('uploads_directory'),
                        $filename
                    );

                    $cours->setFichier($filename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement du fichier.');
                }
            }
           
           
            $this->entityManager->flush();

            return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/cours/edit.html.twig', [
            'cours' => $cours,
            'titre' => 'Edition Cours',
            'coursForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Cours $cours): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cours->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($cours);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('cours_index', [], Response::HTTP_SEE_OTHER);
    }

}
