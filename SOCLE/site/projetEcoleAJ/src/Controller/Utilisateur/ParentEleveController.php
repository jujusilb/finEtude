<?php

namespace App\Controller\Utilisateur;

use App\Entity\Boutique\MembreJeton;
use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Eleve;
use App\Repository\Utilisateur\EleveRepository;
use App\Entity\Utilisateur\ParentEleve;
use App\Repository\Utilisateur\ParentEleveRepository;
use App\Form\Utilisateur\ParentEleveType;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/parentEleve', name: 'parentEleve_')]
class ParentEleveController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

    #[Route('/index', name: 'index')]
    public function index(EleveRepository $eleveRepo, ParentEleveRepository $parentEleveRepo): Response
    {
	
        return $this->render('utilisateur/parent_eleve/index.html.twig', [
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
            $parentEleve->setRoles(["ROLE_PARENT"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($parentEleve, $tmpPass);
            $parentEleve->setPassword($hashTmpPass);
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $parentEleve->setUsername($username);
            $parentEleve->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $parentEleve->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $parentEleve->setImageName('man.png');
                }
            }
            $entityManager->persist($parentEleve);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($parentEleve);
            $listeJeton->setNombreJeton(0);
            $entityManager->persist($listeJeton);
            $entityManager->flush();

            return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/parent_eleve/new.html.twig', [
            'parentEleve' => $parentEleve,
            'titre' => 'Nouveau Parent d\'élève',
            'parentEleveForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(ParentEleve $parentEleve): Response
    {
        return $this->render('utilisateur/parent_eleve/show.html.twig', [
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
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($parentEleve, $tmpPass);
            $parentEleve->setPassword($hashTmpPass);
            
            $entityManager->flush();

            return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/parent_eleve/edit.html.twig', [
            'parentEleve' => $parentEleve,
            'titre' => 'Edition Parent d\'élève',
            'parentEleveForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, ParentEleve $parentEleve, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parentEleve->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($parentEleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parentEleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
