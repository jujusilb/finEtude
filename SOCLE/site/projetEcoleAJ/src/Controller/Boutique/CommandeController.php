<?php

namespace App\Controller\Boutique;

use App\Entity\Boutique\Commande;
use App\Repository\Boutique\CommandeRepository;
use App\Form\Boutique\CommandeType;
use App\Entity\Utilisateur\Membre;
use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commande', name: 'commande_')]
class CommandeController extends AbstractController
{


    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/index', name: 'index')]
    public function index(CommandeRepository $commandeRepo): Response
    {
	
        return $this->render('boutique/commande/index.html.twig', [
            'controller_name' => 'CommandeController',
		    'titre' => 'Commande',
            'commandes' => $commandeRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($commande);
            $this->entityManager->flush();

            return $this->redirectToRoute('commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boutique/commande/new.html.twig', [
            'commande' => $commande,
            'titre' => 'Nouvelle Commande',
            'commandeForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Commande $commande): Response
    {
        return $this->render('boutique/commande/show.html.twig', [
            'commande' => $commande,
            'titre' => 'Affichage Commande',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commande $commande): Response
    {
        $form = $this->createForm(commandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boutique/commande/edit.html.twig', [
            'commande' => $commande,
            'titre' => 'Edition Commande',
            'commandeForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Commande $commande): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commande->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($commande);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('commande_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/mesCommande', name: 'mesCommande')]
    public function mesCommade(CommandeRepository $commandeRepo): Response
    {
        $user=$this->getUser();
        if($user instanceof Membre){
            $commande=$commandeRepo->findBy(['membre'=>$user]);
        }
        return $this->render('boutique/commande/index.html.twig', [
            'controller_name' => 'CommandeController',
		    'titre' => 'Mes commandes',
            'commandes' => $commande,
        ]);
    }
}
