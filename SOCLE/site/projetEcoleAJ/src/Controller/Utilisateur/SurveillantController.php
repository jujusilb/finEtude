<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Surveillant;
use App\Repository\Utilisateur\SurveillantRepository;
use App\Form\Utilisateur\SurveillantType;
use App\Entity\Boutique\MembreJeton;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/surveillant', name: 'surveillant_')]
class SurveillantController extends AbstractController
{



    #[Route('/index', name: 'index')]
    public function index(SurveillantRepository $surveillantRepo): Response
    {
        return $this->render('utilisateur/surveillant/index.html.twig', [
            'controller_name' => 'SurveillantController',
            'titre' => 'Surveillant',
            'surveillants' => $surveillantRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $surveillant = new Surveillant();
        $form = $this->createForm(SurveillantType::class, $surveillant);
        $form->handleRequest($request);

        if ($surveillant->getCreatedAt() === null) {
            $surveillant->setCreatedAt(new \DateTimeImmutable());
        }
        else {
            $surveillant->setUpdatedAt(new \DateTimeImmutable());
        }
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $surveillant->setRoles(["ROLE_SURVEILLANT"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($surveillant, $tmpPass);
            $surveillant->setPassword($hashTmpPass);
             
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $surveillant->setUsername($username);
            $surveillant->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $surveillant->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $surveillant->setImageName('man.png');
                }
            }
            $this->entityManager->persist($surveillant);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($surveillant);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();
            return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/surveillant/new.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Nouveau Surveillant',
            'surveillantForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Surveillant $surveillant): Response
    {
        return $this->render('utilisateur/surveillant/show.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Affichage Surveillant',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Surveillant $surveillant): Response
    {
        $form = $this->createForm(SurveillantType::class, $surveillant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $surveillant->setRoles(["ROLE_SECRETARIAT"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($surveillant, $tmpPass);
            $surveillant->setPassword($hashTmpPass);
             
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $surveillant->setUsername($username);
            $surveillant->setEmail($email);
            $this->entityManager->flush();
            return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/surveillant/edit.html.twig', [
            'surveillant' => $surveillant,
            'titre' => 'Edition Surveillant',
            'surveillantForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Surveillant $surveillant): Response
    {
        if ($this->isCsrfTokenValid('delete' . $surveillant->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($surveillant);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('surveillant_index', [], Response::HTTP_SEE_OTHER);
    }
}
