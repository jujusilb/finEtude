<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Form\Pedagogie\ProfesseurMatiereType;
use App\Repository\Pedagogie\MatiereRepository;
use App\Repository\Utilisateur\ProfesseurRepository;
use App\Repository\Pedagogie\ProfesseurMatiereRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
#[Route('/professeurmatiere', name: 'professeurMatiere_')]
class ProfesseurMatiereController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ProfesseurMatiereRepository $professeurMatiereRepo,
                        ProfesseurRepository $professeurRepo,
                        MatiereRepository $matiereRepo): Response
    {
        return $this->render('pedagogie/professeur_matiere/index.html.twig', [
            'controller_name' => 'ProfesseurMatiereController',
            'titre' => 'Professeur - Matière',
            'professeurMatieres' => $professeurMatiereRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'matieres' => $matiereRepo ->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $professeurMatiere = new ProfesseurMatiere();
        $form = $this->createForm(ProfesseurMatiereType::class, $professeurMatiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($professeurMatiere);
            $entityManager->flush();

            return $this->redirectToRoute('professeurMatiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/professeur_matiere/new.html.twig', [
            'titre'=>'nouveau profMatiere',
            'professeurMatiere' => $professeurMatiere,
            'professeurMatiereForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(ProfesseurMatiere $professeurMatiere): Response
    {
        return $this->render('pedagogie/professeur_matiere/show.html.twig', [
            'professeurMatiere' => $professeurMatiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProfesseurMatiere $professeurMatiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfesseurMatiereType::class, $professeurMatiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('professeurMatiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/professeur_matiere/edit.html.twig', [
            'professeurMatiere' => $professeurMatiere,
            'professeurMatiereForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, ProfesseurMatiere $professeurMatiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $professeurMatiere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($professeurMatiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professeurMatiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
