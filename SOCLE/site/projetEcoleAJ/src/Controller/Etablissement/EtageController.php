<?php

namespace App\Controller\Etablissement;

use App\Entity\Etablissement\Etage;
use App\Repository\Etablissement\EtageRepository;
use App\Form\Etablissement\EtageType;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/etage', name: 'etage_')]
class EtageController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(EtageRepository $etageRepo): Response
    {
	
        return $this->render('etablissement/etage/index.html.twig', [
            'controller_name' => 'EtageController',
		    'titre' => 'Etage',
            'etages' => $etageRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $etage = new Etage();
        $form = $this->createForm(EtageType::class, $etage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($etage);
            $this->entityManager->flush();

            return $this->redirectToRoute('etage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/etage/new.html.twig', [
            'etage' => $etage,
            'titre' => 'Nouvelle Etage',
            'etageForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Etage $etage): Response
    {
        return $this->render('etablissement/etage/show.html.twig', [
            'etage' => $etage,
            'titre' => 'Affichage Etage',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etage $etage): Response
    {
        $form = $this->createForm(etageType::class, $etage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('etage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etablissement/etage/edit.html.twig', [
            'etage' => $etage,
            'titre' => 'Edition Etage',
            'etageForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Etage $etage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $etage->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($etage);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('etage_index', [], Response::HTTP_SEE_OTHER);
    }
}
