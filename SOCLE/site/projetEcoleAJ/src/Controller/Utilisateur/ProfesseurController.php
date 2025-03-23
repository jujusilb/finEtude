<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Professeur;
use App\Form\Utilisateur\ProfesseurType;
use App\Repository\Pedagogie\MatiereRepository;
use App\Repository\Utilisateur\ProfesseurRepository;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/professeur', name: 'professeur_')]
class ProfesseurController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

    #[Route('/index', name: 'index')]
    public function index(MatiereRepository $matiereRepo, ProfesseurRepository $professeurRepo): Response
    {
	
        return $this->render('utilisateur/professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
		    'titre' => 'Professeur',
            'professeurs' => $professeurRepo->findAll(),
            'matieres' => $matiereRepo->findAll(),
        ]);
    }


    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $professeur = new Professeur();
        $form = $this->createForm(ProfesseurType::class, $professeur);
        $form->handleRequest($request);

        if ($professeur->getCreatedAt() === null) {
            $professeur->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $professeur->setRoles(["ROLE_PROFESSEUR"]);
            $tmpPass=trim($form->get('motDePasse')->getData());
            
            $hashTmpPass=$this->passwordHasher->hashPassword($professeur, $tmpPass);
            $professeur->setPassword($hashTmpPass);
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $professeur->setUsername($username);
            $professeur->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $professeur->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $professeur->setImageName('man.png');
                }
            }
            $entityManager->persist($professeur);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($professeur);
            $listeJeton->setNombreJeton(0);
            $entityManager->persist($listeJeton);
            $entityManager->flush();

            return $this->redirectToRoute('professeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/professeur/new.html.twig', [
            'professeur' => $professeur,
            'titre' => 'Nouveau Professeur',
            'professeurForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Professeur $professeur): Response
    {
        return $this->render('utilisateur/professeur/show.html.twig', [
            'professeur' => $professeur,
            'titre' => 'Affichage Professeur',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Professeur $professeur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfesseurType::class, $professeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $professeur->setRoles(["ROLE_PROFESSEUR"]);
            $tmpPass=trim($form->get('motDePasse')->getData());
            $hashTmpPass=$this->passwordHasher->hashPassword($professeur, $tmpPass);
            $professeur->setPassword($hashTmpPass);
            
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $professeur->setUsername($username);
            $professeur->setEmail($email);
            

            $entityManager->persist($professeur);
            $entityManager->flush();
    
            return $this->redirectToRoute('professeur_index', [], Response::HTTP_SEE_OTHER);
        }
    

        return $this->render('utilisateur/professeur/edit.html.twig', [
            'professeur' => $professeur,
            'titre' => 'Edition Professeur',
            'professeurForm' => $form,
        ]);
    }

    #[Route('/{id}/dlete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Professeur $professeur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $professeur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($professeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
