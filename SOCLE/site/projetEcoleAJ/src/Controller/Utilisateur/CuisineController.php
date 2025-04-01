<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Cuisine;
use App\Form\Utilisateur\CuisineType;
use App\Repository\Utilisateur\CuisineRepository;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/cuisine', name: 'cuisine_')]
class CuisineController extends AbstractController
{

    protected $passwordHasher;
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ){
        $this->entityManager = $entityManager;
        $this->passwordHasher=$passwordHasher;
    }

    #[Route('/', name: 'index')]
    public function index(cuisineRepository $cuisineRepo): Response
    {
        return $this->render('utilisateur/cuisine/index.html.twig', [
            'controller_name' => 'cuisineController',
            'titre' => 'Cuisine',
            'cuisines' => $cuisineRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $cuisine = new Cuisine();
        $form = $this->createForm(CuisineType::class, $cuisine);
        $form->handleRequest($request);

        if ($cuisine->getCreatedAt() === null) {
            $cuisine->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $cuisine->setRoles(["ROLE_CUISINE"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($cuisine, $tmpPass);
            $cuisine->setPassword($hashTmpPass);
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $cuisine->setUsername($username);
            $cuisine->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $cuisine->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $cuisine->setImageName('man.png');
                }
            }
            $this->entityManager->persist($cuisine);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($cuisine);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();
            

            return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/cuisine/new.html.twig', [
            'cuisine' => $cuisine,
            'titre' => 'Nouveau Cuisine',
            'cuisineForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Cuisine $cuisine): Response
    {
        return $this->render('utilisateur/cuisine/show.html.twig', [
            'cuisine' => $cuisine,
            'titre' => 'Affichage Cuisine',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cuisine $cuisine): Response
    {
        $form = $this->createForm(CuisineType::class, $cuisine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($cuisine, $tmpPass);
            $cuisine->setPassword($hashTmpPass);
            $this->entityManager->flush();

            return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/cuisine/edit.html.twig', [
            'cuisine' => $cuisine,
            'titre' => 'Edition Cuisine',
            'cuisineForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Cuisine $cuisine): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cuisine->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($cuisine);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('cuisine_index', [], Response::HTTP_SEE_OTHER);
    }
}
