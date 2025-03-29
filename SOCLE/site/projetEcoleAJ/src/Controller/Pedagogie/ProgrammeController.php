<?php

namespace App\Controller\Pedagogie;

use App\Outils\CouteauSuisse;
use App\Entity\Pedagogie\Programme;
use App\Repository\Pedagogie\ProgrammeRepository;
use App\Repository\Pedagogie\PromotionRepository;
use App\Repository\Pedagogie\ProfesseurMatiereRepository;
use App\Repository\Pedagogie\MatiereRepository;
use App\Form\Pedagogie\ProgrammeType;
use App\Repository\Utilisateur\ProfesseurRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/programme', name: 'programme_')]
class ProgrammeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ProgrammeRepository $programmeRepo,
                        PromotionRepository $promotionRepo,
                        ProfesseurRepository $professeurRepo,
                        MatiereRepository $matiereRepo): Response
    {   

        return $this->render('pedagogie/programme/index.html.twig', [
            'controller_name' => 'ProgrammeController',
            'titre' => 'Programme',
            'programmes' => $programmeRepo->findAll(),
            'promotions' => $promotionRepo->findAll(),
            'professeurs' => $professeurRepo->findAll(),
            'matieres' => $matiereRepo ->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(ProgrammeRepository $programmeRepo, Request $request): Response
    {
        $programme = new Programme();
        $form = $this->createForm(ProgrammeType::class, $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profMat=$form->get('professeurMatiere')->getData();
            $prof=$profMat->getProfesseur();
            $mat=$profMat->getMatiere();
            $programme->setProfesseur($prof);
            $promo=$form->get('promotion')->getData();
            $tabMat=$programmeRepo->findAll();
            foreach($tabMat as $item){
                if($item->getMatiere() == $mat && $item->getPromotion() == $promo)
                {
                    $this->redirectToRoute('programme_nouveau');
                }
            }
            if (count($tabMat)<1){
                $this->RedirectToRoute('programme_nouveau');
            }
            $programme->setMatiere($profMat->getMatiere());
            $programme->setPromotion($form->get('promotion')->getData());
            $this->entityManager->persist($programme);
            $this->entityManager->flush();

            return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/programme/new.html.twig', [
            'programme' => $programme,
            'titre' => 'Nouveau Programme',
            'programmeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Programme $programme): Response
    {
        return $this->render('pedagogie/programme/show.html.twig', [
            'programme' => $programme,
            'titre' => 'Affichage Programme',
            
        ]);
    }

    #[Route('/{professeur}/{matiere}/{promotion}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(
        int $professeur,
        int $matiere,
        int $promotion,
        Request $request,
        ProgrammeRepository $programmeRepository
    ): Response {
        $programme = $programmeRepository->findOneBy([
            'professeur' => $professeur,
            'matiere' => $matiere,
            'promotion' => $promotion,
        ]);

        if (!$programme) {
            throw $this->createNotFoundException('Programme non trouvé');
        }

        $form = $this->createForm(ProgrammeType::class, $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pedagogie/programme/edit.html.twig', [
            'programme' => $programme,
            'titre' => 'Edition Programme',
            'programmeForm' => $form->createView(),
        ]);
    }

    #[Route('/{professeur}/{matiere}/{promotion}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(
        int $professeur,
        int $matiere,
        int $promotion,
        Request $request,
        ProgrammeRepository $programmeRepo,
    ): Response {
        $programme = $programmeRepo->findOneBy([
            'professeur' => $professeur,
            'matiere' => $matiere,
            'promotion' => $promotion,
        ]);
    
        if (!$programme) {
            throw $this->createNotFoundException('Programme non trouvé');
        }
    
        $csrfTokenId = 'delete' . $professeur . $matiere . $promotion; // Créer un token CSRF unique
        if ($this->isCsrfTokenValid($csrfTokenId, $request->request->get('_token'))) {
            $this->entityManager->remove($programme);
            $this->entityManager->flush();
        }
    
        return $this->redirectToRoute('programme_index', [], Response::HTTP_SEE_OTHER);
    }

}
