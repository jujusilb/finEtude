<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Eleve;
use App\Repository\Utilisateur\EleveRepository;
use App\Entity\Boutique\MembreJeton;
use App\Form\Utilisateur\EleveType;
use ContainerCpcLtUc\getRepasRepositoryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/eleve', name: 'eleve_')]
class EleveController extends AbstractController
{

    #[Route('/index', name: 'index')]
    public function index(EleveRepository $eleveRepo): Response
    {
	    return $this->render('utilisateur/eleve/index.html.twig', [
            'controller_name' => 'EleveController',
		    'titre' => 'Eleve',
            'eleves' => $eleveRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $eleve = new Eleve();
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eleve->setRoles(["ROLE_ELEVE"]);
            $promotion = $eleve->getPromotion();
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($eleve, $tmpPass);
            $eleve->setPassword($hashTmpPass);

            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $eleve->setUsername($username);
            $eleve->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $eleve->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $eleve->setImageName('man.png');
                }
            }
            $this->entityManager->persist($eleve);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($eleve);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();
            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        
        return $this->render('utilisateur/eleve/new.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Nouvel Élève',
            'eleveForm' => $form->createView(),
        ]);
    }

    


    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Eleve $eleve): Response
    {
        return $this->render('utilisateur/eleve/show.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Affichage Eleve',
            ]);
    }


    
    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, eleve $eleve): Response
    {
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($eleve, $tmpPass);
            $eleve->setPassword($hashTmpPass);
            $eleve->setRoles(["ROLE_ELEVE"]);
            $promotion = $eleve->getPromotion();
            if ($promotion) {
                $rolePromotion = 'ROLE_' . strtoupper($promotion->getLibelle());
                $eleve->setRoles(array_merge($eleve->getRoles(), [$rolePromotion]));
            }
            $this->entityManager->flush();
            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/eleve/edit.html.twig', [
            'eleve' => $eleve,
            'titre' => 'Edition Eleve',
            'eleveForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Eleve $eleve): Response
    {
        if ($this->isCsrfTokenValid('delete' . $eleve->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($eleve);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
