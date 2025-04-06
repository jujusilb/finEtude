<?php

namespace App\Controller\Boutique;

use App\Entity\Boutique\Produit;
use App\Repository\Boutique\ProduitRepository;
use App\Form\Boutique\ProduitType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Core\DateTime;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/produit', name: 'produit_')]
class ProduitController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'index')]
    public function index(ProduitRepository $produitRepo): Response
    {
	
        return $this->render('boutique/produit/index.html.twig', [
            'controller_name' => 'ProduitController',
		    'titre' => 'Produit',
            'produits' => $produitRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $produit->setCreatedAt(new DateTimeImmutable());
            $this->entityManager->persist($produit);
            $this->entityManager->flush();

            return $this->redirectToRoute('produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boutique/produit/new.html.twig', [
            'produit' => $produit,
            'titre' => 'Nouvelle Produit',
            'produitForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Produit $produit): Response
    {
        return $this->render('boutique/produit/show.html.twig', [
            'produit' => $produit,
            'titre' => 'Affichage Produit',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(produitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boutique/produit/edit.html.twig', [
            'produit' => $produit,
            'titre' => 'Edition Produit',
            'produitForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($produit);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
