<?php

namespace App\Controller\Pedagogie;

use App\Entity\Pedagogie\Matiere;
use App\Repository\Pedagogie\MatiereRepository;
use App\Form\Pedagogie\MatiereType;
use App\Repository\Utilisateur\ProfesseurRepository;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/matiere', name: 'matiere_')]
class MatiereController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(
        MatiereRepository $matiereRepo, 
        ProfesseurRepository $professeurRepo
    ): Response
    {
	
        return $this->render('pedagogie/matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
		    'titre' => 'Matière',
            'matieres' => $matiereRepo->findAll(),
            'professeurs' =>$professeurRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $matiere = new Matiere();
        $form = $this->createForm(MatiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($matiere);
            $this->entityManager->flush();

            return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/matiere/new.html.twig', [
            'matiere' => $matiere,
            'titre' => 'Nouvelle Matière',
            'matiereForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Matiere $matiere): Response
    {
        return $this->render('pedagogie/matiere/show.html.twig', [
            'matiere' => $matiere,
            'titre' => 'Affichage Matière',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Matiere $matiere): Response
    {
        $form = $this->createForm(matiereType::class, $matiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/matiere/edit.html.twig', [
            'matiere' => $matiere,
            'titre' => 'Edition Matière',
            'matiereForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Matiere $matiere): Response
    {
        if ($this->isCsrfTokenValid('delete' . $matiere->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($matiere);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('matiere_index', [], Response::HTTP_SEE_OTHER);
    }
}
