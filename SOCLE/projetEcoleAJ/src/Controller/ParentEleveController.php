<?php

namespace App\Controller;
use App\Entity\Eleve;
use App\Repository\EleveRepository;
use App\Entity\ParentEleve;
use App\Repository\ParentEleveRepository;
use App\Form\ParentEleveType;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;


#[Route('/parentEleve', name: 'parentEleve_')]
class ParentEleveController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(EleveRepository $eleveRepo, ParentEleveRepository $parentEleveRepo): Response
    {
	
        return $this->render('parent_eleve/index.html.twig', [
            'controller_name' => 'ParentEleveController',
		    'titre' => 'Parent d\'élève',
            'parentEleves' => $parentEleveRepo->findAll(),
            'eleve' => $eleveRepo->findAll()
        ]);
    }
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $parentEleve = new ParentEleve();
        $form = $this->createForm(ParentEleveType::class, $parentEleve);
        $form->handleRequest($request);

        if ($parentEleve->getCreatedAt() === null) {
            $parentEleve->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $parentEleve->setRoles(["ROLE_PARENTELEVE"]);
            $entityManager->persist($parentEleve);
            $entityManager->flush();

            return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parent_eleve/new.html.twig', [
            'parentEleve' => $parentEleve,
            'titre' => 'Nouveau Parent d\'élève',
            'parentEleveForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(ParentEleve $parentEleve): Response
    {
        return $this->render('parent_eleve/show.html.twig', [
            'parentEleve' => $parentEleve,
            'titre' => 'Affichage Parent d\'élève',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, ParentEleve $parentEleve, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParentEleveType::class, $parentEleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parent_eleve/edit.html.twig', [
            'parentEleve' => $parentEleve,
            'titre' => 'Edition Parent d\'élève',
            'parentEleveForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, ParentEleve $parentEleve, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parentEleve->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($parentEleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
