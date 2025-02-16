<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\MembreRepository;

use App\Form\Utilisateur\MembreType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/membre', name: 'membre_')]
class MembreController extends AbstractController
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this -> passwordHasher=$passwordHasher;
    }

    #[Route('/index', name: 'index')]
    public function index(MembreRepository $membreRepo): Response
    {
        return $this->render('utilisateur/membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'titre' => 'Membre',
            'membres' => $membreRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Membre();
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membre->setPassword($this->passwordHasher->hashPassword($membre, $membre->getPassword()));
            $membre->setCreatedAt(new \DateTimeImmutable()); // Set the createdAt field before persisting
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('membre_index', [
                'titre' => 'Nouveau Membre'
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/membre/new.html.twig', [
            'membre' => $membre,
            'titre' => 'N9ouveau Membre',
            'membreForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Membre $membre): Response
    {
        return $this->render('utilisateur/membre/show.html.twig', [
            'membre' => $membre,
            'titre' => 'Affichage Membre',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membre->setPassword($this->passwordHasher->hashPassword($membre, $membre->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('membre_index', 
            ['titre' => 'Edition Membre'],
                 Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/membre/edit.html.twig', [
            'membre' => $membre,
            'titre' => 'Edition Membre',
            'membreForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $membre->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($membre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('membre_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{qui}', name: 'getQui', methods: ['GET'])]
    public function qui(string $qui, MembreRepository $membreRepo){
        $data=$membreRepo->getConcatNames($qui);
        if(count($data)>0){
            echo json_encode($data);
        }
        else return 0;
    }
}
