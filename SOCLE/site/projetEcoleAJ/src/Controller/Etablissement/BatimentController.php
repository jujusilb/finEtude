<?php

namespace App\Controller\Etablissement;

use App\Entity\Etablissement\Batiment;
use App\Repository\Etablissement\BatimentRepository;
use App\Form\Etablissement\BatimentType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/batiment', name: 'batiment_')]
class BatimentController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/index', name: 'index')]
    public function index(BatimentRepository $batimentRepo): Response
    {
	
        return $this->render('etablissement/batiment/index.html.twig', [
            'controller_name' => 'BatimentController',
		    'titre' => 'Batiment',
            'batiments' => $batimentRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $batiment = new Batiment();
        $form = $this->createForm(BatimentType::class, $batiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($batiment);
            $this->entityManager->flush();

            return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/batiment/new.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Nouvelle Batiment',
            'batimentForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Batiment $batiment): Response
    {
        return $this->render('etablissement/batiment/show.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Affichage Batiment',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Batiment $batiment): Response
    {
        $form = $this->createForm(batimentType::class, $batiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/batiment/edit.html.twig', [
            'batiment' => $batiment,
            'titre' => 'Edition Batiment',
            'batimentForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Batiment $batiment): Response
    {
        if ($this->isCsrfTokenValid('delete' . $batiment->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($batiment);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('batiment_index', [], Response::HTTP_SEE_OTHER);
    }
}
