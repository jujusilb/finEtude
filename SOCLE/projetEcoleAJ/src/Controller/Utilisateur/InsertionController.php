<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Insertion;
use App\Repository\Utilisateur\InsertionRepository;
use App\Form\Utilisateur\InsertionType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/insertion', name: 'insertion_')]
class InsertionController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

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
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $insertion = new Insertion();
        $form = $this->createForm(InsertionType::class, $insertion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $insertion->setRoles(["ROLE_INSERTION"]);
            $insertion->setPassword($this->passwordHasher->hashPassword($insertion, $insertion->getPassword()));
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($insertion);
            $email =$getter->getEmail($insertion, $username);
            $insertion->setUsername($username);
            $insertion->setEmail($email);

            $entityManager->persist($insertion);
            $entityManager->flush();
            return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/insertion/new.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Nouveau Insertion',
            'insertionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Insertion $insertion): Response
    {
        return $this->render('utilisateur/insertion/show.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Affichage Insertion',
            ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, insertion $insertion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InsertionType::class, $insertion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $insertion->setPassword($this->passwordHasher->hashPassword($insertion, $insertion->getPassword()));
            $insertion->setRoles(["ROLE_INSERTION"]);
            
            $entityManager->flush();
            return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/insertion/edit.html.twig', [
            'insertion' => $insertion,
            'titre' => 'Edition Insertion',
            'insertionForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Insertion $insertion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $insertion->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($insertion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('insertion_index', [], Response::HTTP_SEE_OTHER);
    }
}
