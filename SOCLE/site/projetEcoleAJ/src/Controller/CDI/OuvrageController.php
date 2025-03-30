<?php

namespace App\Controller\CDI;

use App\Entity\CDI\Ouvrage;
use App\Repository\CDI\OuvrageRepository;
use App\Form\CDI\OuvrageType;
use App\Repository\CDI\CategorieOuvrageRepository;
use App\Entity\CDI\StatutOuvrage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ouvrage', name: 'ouvrage_')]
class OuvrageController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(CategorieOuvrageRepository $categorieOuvrageRepo, OuvrageRepository $ouvrageRepo): Response
    {
	
        

        return $this->render('CDI/ouvrage/index.html.twig', [
            'controller_name' => 'OuvrageController',
		    'titre' => 'Ouvrage',
            'ouvrages' => $ouvrageRepo->findAll(),
            'categorieOuvrage' => $categorieOuvrageRepo->findAll(),
        ]);
    }

    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(CategorieOuvrageRepository $categorieOuvrageRepo, OuvrageRepository $ouvrageRepo): Response
    {
        $ouvrages = $ouvrageRepo->findAll();

        // Regrouper les ouvrages par statut
        $groupedByStatut = [];
        foreach ($ouvrages as $ouvrage) {
            $statutLibelle = $ouvrage->getStatutOuvrage()->getLibelle();
            if (!isset($groupedByStatut[$statutLibelle])) {
                $groupedByStatut[$statutLibelle] = [];
            }
            $groupedByStatut[$statutLibelle][] = $ouvrage;
        }
        return $this->render('CDI/ouvrage/catalogue.html.twig', [
            'controller_name' => 'OuvrageController',
		    'titre' => 'Catalogue',
            'groupedByStatut' => $groupedByStatut,
            'ouvrages' => $ouvrageRepo->findAll(),
            'categorieOuvrage' => $categorieOuvrageRepo->findAll(),
        ]);
    }
    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $ouvrage = new Ouvrage();
        $form = $this->createForm(OuvrageType::class, $ouvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statutOuvrage =$this->entityManager->getRepository(StatutOuvrage::class)->findOneBy(['id'=>1]);
            $ouvrage->setStatutOuvrage($statutOuvrage);
            $this->entityManager->persist($ouvrage);
            $this->entityManager->flush();

            return $this->redirectToRoute('ouvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/ouvrage/new.html.twig', [
            'ouvrage' => $ouvrage,
            'titre' => 'Nouvel Ouvrage',
            'ouvrageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Ouvrage $ouvrage): Response
    {
        return $this->render('CDI/ouvrage/show.html.twig', [
            'ouvrage' => $ouvrage,
            'titre' => 'Affichage Ouvrage',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ouvrage $ouvrage): Response
    {
        $form = $this->createForm(ouvrageType::class, $ouvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('ouvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('CDI/ouvrage/edit.html.twig', [
            'ouvrage' => $ouvrage,
            'titre' => 'Edition Ouvrage',
            'ouvrageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Ouvrage $ouvrage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $ouvrage->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($ouvrage);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('ouvrage_index', [], Response::HTTP_SEE_OTHER);
    }
}
