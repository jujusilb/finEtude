<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;
use App\Entity\Utilisateur\Direction;
use App\Repository\Utilisateur\DirectionRepository;
use App\Form\Utilisateur\DirectionType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/direction', name: 'direction_')]
class DirectionController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

    #[Route('/index', name: 'index')]
    public function index(directionRepository $directionRepo): Response
    {
        return $this->render('utilisateur/direction/index.html.twig', [
            'controller_name' => 'directionController',
            'titre' => 'Direction',
            'directions' => $directionRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $direction = new Direction();
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($direction->getCreatedAt() === null) {
            $direction->setCreatedAt(new \DateTimeImmutable());
        }
        
        if ($form->isSubmitted() && $form->isValid()) {
            $direction->setRoles(["ROLE_DIRECTION"]);
            $direction->setPassword($this->passwordHasher->hashPassword($direction, $direction->getPassword()));
            
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($direction);
            $email =$getter->getEmail($direction, $username);
            $direction->setUsername($username);
            $direction->setEmail($email);

            $entityManager->persist($direction);
            $entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/direction/new.html.twig', [
            'direction' => $direction,
            'titre' => 'Nouveau Direction',
            'directionForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Direction $direction): Response
    {
        return $this->render('utilisateur/direction/show.html.twig', [
            'direction' => $direction,
            'titre' => 'Affichage Directon',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Direction $direction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DirectionType::class, $direction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $direction->setPassword($this->passwordHasher->hashPassword($direction, $direction->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/direction/edit.html.twig', [
            'direction' => $direction,
            'titre' => 'Edition Direction',
            'directionForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Direction $direction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $direction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($direction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('direction_index', [], Response::HTTP_SEE_OTHER);
    }
}
