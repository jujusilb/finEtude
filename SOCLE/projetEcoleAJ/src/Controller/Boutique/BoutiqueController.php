<?php

namespace App\Controller\Boutique;

use App\Repository\Boutique\MembreJetonRepository;
use App\Entity\Boutique\Commande;
use App\Exception\NotEnoughException;
use App\Exception\OutOfStockException;
use App\Entity\Utilisateur\Membre;
use App\Entity\Boutique\Produit;
use App\Entity\Boutique\membreEvent;
use App\Entity\Boutique\MembreJeton;
use App\repository\Utilisateur\MembreJetonReository;
use App\Repository\Boutique\ProduitRepository;
use App\Repository\Forum\MembreRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/boutique', name: 'boutique_')]
final class BoutiqueController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('boutique/boutique/index.html.twig', [
            'controller_name' => 'BoutiqueController',
            'titre' => 'index boutique',
        ]);
    }

    #[Route('/liste', name: 'liste')]
    public function liste(ProduitRepository $produitRepo): Response
    {
        
        $produitsParType = $produitRepo->findByType(false);
        return $this->render('boutique/boutique/liste.html.twig', [
            'controller_name' => 'BoutiqueController',
            'produitss' => $produitsParType,
            'titre' => 'Boutique'
        ]);
    }

    #[Route('/archive', name: 'archive')]
    public function listeArchive(ProduitRepository $produitRepo): Response
    {
        return $this->render('boutique/boutique/liste.html.twig', [
            'controller_name' => 'BoutiqueController',
            'produits' => $produitRepo->findByArchive(true),
            'titre' => 'Boutique'
        ]);
    }

    #[Route('/{idProduit}/achat', name: 'achatProduit', methods: ['GET', 'POST'])]
    public function AchatProduit(Request $request, $idProduit){

        $user = $this->getUser();
        $entityManager = $this->entityManager;
        $produit = $entityManager->getRepository(Produit::class)->find($idProduit);
        $quantity = $request->get('quantity');
        //dd($quantity);
        if (!$produit) {
            throw $this->createNotFoundException('Produit non trouvé');
        } else if ($produit->getStock() <= 0) {
            throw new OutOfStockException();
        } else if ($produit->getStock() < $quantity) {
            throw new NotEnoughException();
        }
        $prixTotal = $produit->getPrix() * $quantity;

        $commande = new Commande();
        $commande->setMembre($user);
        $commande->setProduit($produit);
        $commande->setQuantity($quantity);
        $commande->setPrixTotal($prixTotal);
        $commande->setDateAchat(new \DateTime());
        $produit->setStock($produit->getstock() - $quantity);
        $entityManager->persist($commande);
        if ($produit->getType()->getLibelle() == 'Jetons') {
            $this->updateMembreJeton($user, $quantity);
        }else if ($produit->getType() == 'Event') {
            $this->addMembreToEvent($user, $produit);
        }
        $entityManager->flush();
        return $this->redirectToRoute('boutique_liste');
    }

 
    private function updateMembreJeton($user, $quantity)
    {
        $entityManager = $this->entityManager;
        $user = $this->getUser();
        if ($user instanceof Membre) {
            $jeton = $user->getJetonRepas();
            $user->setJetonRepas($jeton + $quantity);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    }
   
    private function addMembreToEvent($user, $produit)
    {
        $entityManager=$this->entityManager;
        
        $membreEvent = new MembreEvent();
        $membreEvent->setMembre($user);
        $membreEvent->setProduit($produit);
        $membreEvent->setCreatedAt(new DateTimeImmutable());
        $entityManager->persist($membreEvent);
        $entityManager->flush();
    }
}
