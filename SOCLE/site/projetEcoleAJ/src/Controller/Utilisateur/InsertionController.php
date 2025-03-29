<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Insertion;
use App\Repository\Utilisateur\InsertionRepository;
use App\Form\Utilisateur\InsertionType;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/insertion', name: 'insertion_')]
class InsertionController extends AbstractController
{



    #[Route('/index', name: 'index')]
    public function index(InsertionRepository $insertionRepo): Response
    {
	
        return $this->render('utilisateur/insertion/index.html.twig', [
            'controller_name' => 'InsertionController',
		    'titre' => 'Insertion',
            'insertions' => $insertionRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $insertion = new Insertion();
        $form = $this->createForm(InsertionType::class, $insertion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $insertion->setRoles(["ROLE_INSERTION"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($insertion, $tmpPass);
            $insertion->setPassword($hashTmpPass);

            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $insertion->setUsername($username);
            $insertion->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $insertion->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $insertion->setImageName('man.png');
                }
            }
            $this->entityManager->persist($insertion);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($insertion);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();
            return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/insertion/new.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Nouveau Insertion',
            'insertionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Insertion $insertion): Response
    {
        return $this->render('utilisateur/insertion/show.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Affichage Insertion',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, insertion $insertion): Response
    {
        $form = $this->createForm(InsertionType::class, $insertion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($insertion, $tmpPass);
            $insertion->setPassword($hashTmpPass);
            $insertion->setRoles(["ROLE_INSERTION"]);
            
            $this->entityManager->flush();
            return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/insertion/edit.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Edition Insertion',
            'insertionForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Insertion $insertion): Response
    {
        if ($this->isCsrfTokenValid('delete' . $insertion->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($insertion);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
    }
}
