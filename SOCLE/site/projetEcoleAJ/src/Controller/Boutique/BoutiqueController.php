<?php

namespace App\Controller\Boutique;

use App\Repository\Boutique\MembreJetonRepository;
use App\Entity\Boutique\Commande;
use App\Exception\NotEnoughException;
use App\Exception\OutOfStockException;
use App\Entity\Utilisateur\Membre;
use App\Entity\Boutique\Produit;
use App\Entity\Boutique\MembreEvent;
use App\Entity\Boutique\MembreJeton;
use App\repository\Utilisateur\MembreJetonReository;
use App\Repository\Boutique\ProduitRepository;
use App\Repository\Utilisateur\MembreRepository;
use DateTimeImmutable;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/boutique', name: 'boutique_')]
final class BoutiqueController extends AbstractController
{

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
        
        $produit = $this->entityManager->getRepository(Produit::class)->find($idProduit);
        $quantity = $request->get('quantity');
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
        $this->entityManager->persist($commande);
        //dd('user', $user, 'quantity', $quantity, 'produit', $produit, 'type', $produit->getCategorieProduit()->getLibelle());
        if ($produit->getCategorieProduit()->getLibelle() === 'Jeton') {
            $this->updateMembreJeton($user, $quantity);
        } elseif ($produit->getCategorieProduit()->getLibelle() === 'Event') {
            try {
                $this->addMembreToEvent($user, $produit);
                $this->addFlash('success', 'Inscription à l\'événement réussie.');
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }
    
        $this->entityManager->flush();
        return $this->redirectToRoute('boutique_liste');
    }

 
    private function updateMembreJeton($user, $quantity)
    {
        $record=$this->entityManager->getRepository(MembreJeton::class)->findOneBy(['membre'=>$user]);
        if (!$record){
            $record=new MembreJeton();
            $record->setMembre($user);
            $record->setNombreJeton($quantity);
        } else {
            $record->setMembre($user);
            $jeton=$record->getNombreJeton();
            $record->setNombreJeton($jeton+$quantity);
        }
        $this->entityManager->persist($record);
        $this->entityManager->flush();
    }
    
   
    private function addMembreToEvent($user, $produit)
    {
        $membreEventExistant = $this->entityManager->getRepository(MembreEvent::class)->findOneBy([
            'membre' => $user,
            'produit' => $produit,
        ]);
    
        if ($membreEventExistant) {
            // L'utilisateur est déjà inscrit, lancer une exception ou retourner une erreur
            throw new \Exception("Vous êtes déjà inscrit à cet événement.");
            // Ou, si vous ne voulez pas lancer d'exception :
            // return false; 
        }
    
        $membreEvent = new MembreEvent();
        $membreEvent->setMembre($user);
        $membreEvent->setProduit($produit);
        $membreEvent->setCreatedAt(new DateTimeImmutable());
        $this->entityManager->persist($membreEvent);
        $this->entityManager->flush();
    
        // Ou, si vous ne voulez pas lancer d'exception :
        // return true;
    }
}
