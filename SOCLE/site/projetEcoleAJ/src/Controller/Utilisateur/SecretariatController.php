<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Secretariat;
use App\Repository\Utilisateur\SecretariatRepository;
use App\Form\Utilisateur\SecretariatType;
use App\Entity\Boutique\MembreJeton;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/secretariat', name: 'secretariat_')]
class SecretariatController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

    #[Route('/index', name: 'index')]
    public function index(SecretariatRepository $secretariatRepo): Response
    {
	
        return $this->render('utilisateur/secretariat/index.html.twig', [
            'controller_name' => 'SecretariatController',
		    'titre' => 'Secretariat',
            'secretariats' => $secretariatRepo->findAll(),
        ]);
    }    
    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $secretariat = new Secretariat();
        $form = $this->createForm(SecretariatType::class, $secretariat);
        $form->handleRequest($request);

        if ($secretariat->getCreatedAt() === null) {
            $secretariat->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $secretariat->setRoles(["ROLE_SECRETARIAT"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($secretariat, $tmpPass);
            $secretariat->setPassword($hashTmpPass);
                        

            $getter =new CouteauSuisse();
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $secretariat->setUsername($username);
            $secretariat->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $secretariat->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $secretariat->setImageName('man.png');
                }
            }
            $entityManager->persist($secretariat);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($secretariat);
            $listeJeton->setNombreJeton(0);
            $entityManager->persist($listeJeton);
            $entityManager->flush();

            return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/secretariat/new.html.twig', [
            'secretariat' => $secretariat,
            'titre' => 'Nouveau Secretariat',
            'secretariatForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Secretariat $secretariat): Response
    {
        return $this->render('utilisateur/secretariat/show.html.twig', [
            'secretariat' => $secretariat,
            'titre' => 'Affichage Secretariat',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Secretariat $secretariat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SecretariatType::class, $secretariat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $secretariat->setRoles(["ROLE_SECRETARIAT"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($secretariat, $tmpPass);
            $secretariat->setPassword($hashTmpPass);
                        
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $secretariat->setUsername($username);
            $secretariat->setEmail($email);

            $entityManager->flush();

            return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/secretariat/edit.html.twig', [
            'secretariat' => $secretariat,
            'titre' => 'Edition Secretariat',
            'secretariatForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Secretariat $secretariat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $secretariat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($secretariat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
    }
}
