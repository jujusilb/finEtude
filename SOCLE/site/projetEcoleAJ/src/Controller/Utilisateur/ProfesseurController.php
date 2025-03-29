<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\ProfesseurMatiere;
use App\Form\Utilisateur\ProfesseurType;
use App\Repository\Pedagogie\MatiereRepository;
use App\Repository\Pedagogie\ProfesseurMatiereRepository;
use App\Repository\Utilisateur\ProfesseurRepository;
use App\Entity\Boutique\MembreJeton;
use App\Tests\WebTest\Pedagogie\ProfesseurMatiereRouteTest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/professeur', name: 'professeur_')]
class ProfesseurController extends AbstractController
{


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
    public function new (ProfesseurMatiereRepository $profMatRepo, Request $request): Response
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
            $matieres = $form->get('matieres')->getData();
            foreach ($matieres as $matiere) {
                // Vérifier si l'association existe déjà
                $existingProfesseurMatiere =$profMatRepo->findOneBy([
                    'professeur' => $professeur,
                    'matiere' => $matiere,
                ]);

                if (!$existingProfesseurMatiere) {
                    $professeurMatiere = new ProfesseurMatiere();
                    $professeurMatiere->setProfesseur($professeur);
                    $professeurMatiere->setMatiere($matiere);
                    $this->entityManager->persist($professeurMatiere);
                }
            }
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
            $this->entityManager->persist($professeur);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($professeur);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();

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
    public function edit(ProfesseurMatiereRepository $profMatRepo, Request $request, Professeur $professeur): Response
    {
        $form = $this->createForm(ProfesseurType::class, $professeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $tabYet=$profMatRepo->findby(['professeur'=>$professeur]);
            $matieres = $form->get('matieres')->getData();
            foreach ($tabYet as $relationYet) {
                $matiereInExisting = $relationYet->getMatiere();
                if (!in_array($matiereInExisting, $matieres->toArray())) {
                    $this->entityManager->remove($relationYet);
                }
            }
    
            foreach ($matieres as $matiere) {
                $professeurMatiereYet = $profMatRepo->findOneBy([
                    'professeur' => $professeur,
                    'matiere' => $matiere,
                ]);
    
                if (!$professeurMatiereYet) {
                    $professeurMatiere = new ProfesseurMatiere();
                    $professeurMatiere->setProfesseur($professeur);
                    $professeurMatiere->setMatiere($matiere);
                    $this->entityManager->persist($professeurMatiere);
                }
            }
            $professeur->setRoles(["ROLE_PROFESSEUR"]);
            $tmpPass=trim($form->get('motDePasse')->getData());
            $hashTmpPass=$this->passwordHasher->hashPassword($professeur, $tmpPass);
            $professeur->setPassword($hashTmpPass);
            
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $professeur->setUsername($username);
            $professeur->setEmail($email);
            

            $this->entityManager->persist($professeur);
            $this->entityManager->flush();
    
            return $this->redirectToRoute('professeur_index', [], Response::HTTP_SEE_OTHER);
        }
    

        return $this->render('utilisateur/professeur/edit.html.twig', [
            'professeur' => $professeur,
            'titre' => 'Edition Professeur',
            'professeurForm' => $form,
        ]);
    }

    #[Route('/{id}/dlete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Professeur $professeur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $professeur->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($professeur);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('professeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
