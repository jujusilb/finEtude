<?php

namespace App\Controller\Etablissement;

use App\Entity\Etablissement\Salle;
use App\Repository\Etablissement\SalleRepository;
use App\Form\Etablissement\SalleType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/salle', name: 'salle_')]
class SalleController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(SalleRepository $salleRepo): Response
    {
	
        return $this->render('etablissement/salle/index.html.twig', [
            'controller_name' => 'SalleController',
		    'titre' => 'Salle',
            'salles' => $salleRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $salle = new Salle();
        $form = $this->createForm(SalleType::class, $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($salle);
            $this->entityManager->flush();

            return $this->redirectToRoute('salle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/salle/new.html.twig', [
            'salle' => $salle,
            'titre' => 'Nouvelle Salle',
            'salleForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Salle $salle): Response
    {
        return $this->render('etablissement/salle/show.html.twig', [
            'salle' => $salle,
            'titre' => 'Affichage Salle',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Salle $salle): Response
    {
        $form = $this->createForm(salleType::class, $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('salle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/salle/edit.html.twig', [
            'salle' => $salle,
            'titre' => 'Edition Salle',
            'salleForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Salle $salle): Response
    {
        if ($this->isCsrfTokenValid('delete' . $salle->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($salle);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('salle_index', [], Response::HTTP_SEE_OTHER);
    }
}
