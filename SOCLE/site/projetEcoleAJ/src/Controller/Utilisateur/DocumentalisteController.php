<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Documentaliste;
use App\Form\Utilisateur\DocumentalisteType;
use App\Repository\Utilisateur\DocumentalisteRepository;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/documentaliste', name: 'documentaliste_')]
class DocumentalisteController extends AbstractController
{


    #[Route('/index', name: 'index')]
    public function index(DocumentalisteRepository $documentalisteRepo): Response
    {
        return $this->render('utilisateur/documentaliste/index.html.twig', [
            'controller_name' => 'DocumentalisteController',
            'titre' => 'Documentaliste',
            'documentalistes' => $documentalisteRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {


        
        $documentaliste = new Documentaliste();
        $form = $this->createForm(DocumentalisteType::class, $documentaliste);
        $form->handleRequest($request);

        if ($documentaliste->getCreatedAt() === null) {
            $documentaliste->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $documentaliste->setRoles(["ROLE_DOCUMENTALISTE"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($documentaliste, $tmpPass);
            $documentaliste->setPassword($hashTmpPass);
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $documentaliste->setUsername($username);
            $documentaliste->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $documentaliste->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $documentaliste->setImageName('man.png');
                }
            }
            $this->entityManager->persist($documentaliste);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($documentaliste);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();

            return $this->redirectToRoute('documentaliste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/documentaliste/new.html.twig', [
            'documentaliste' => $documentaliste,
            'titre' => 'Nouveau Documentaliste',
            'documentalisteForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Documentaliste $documentaliste): Response
    {
        return $this->render('utilisateur/documentaliste/show.html.twig', [
            'documentaliste' => $documentaliste,
            'titre' => 'Affichage Documentaliste',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Documentaliste $documentaliste): Response
    {
        $form = $this->createForm(DocumentalisteType::class, $documentaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($documentaliste, $tmpPass);
            $documentaliste->setPassword($hashTmpPass);
            $this->entityManager->flush();

            return $this->redirectToRoute('documentaliste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/documentaliste/edit.html.twig', [
            'documentaliste' => $documentaliste,
            'titre' => 'Edition Documentaliste',
            'documentalisteForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Documentaliste $documentaliste): Response
    {
        if ($this->isCsrfTokenValid('delete' . $documentaliste->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($documentaliste);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('documentaliste_index', [], Response::HTTP_SEE_OTHER);
    }
}
