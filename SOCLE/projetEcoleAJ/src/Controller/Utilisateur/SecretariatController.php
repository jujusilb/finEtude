<?php

namespace App\Controller\Utilisateur;

use App\Entity\Utilisateur\Secretariat;
use App\Repository\Utilisateur\SecretariatRepository;
use App\Form\Utilisateur\SecretariatType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/secretariat', name: 'secretariat_')]
class SecretariatController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(SecretariatRepository $secretariatRepo): Response
    {
	
        return $this->render('Secretariat/index.html.twig', [
            'controller_name' => 'SecretariatController',
		    'titre' => 'Secretariat',
            'secretariats' => $secretariatRepo->findAll(),
        ]);
    }    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
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
            $entityManager->persist($secretariat);
            $entityManager->flush();

            return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('secretariat/new.html.twig', [
            'secretariat' => $secretariat,
            'titre' => 'Nouveau Secretariat',
            'secretariatForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Secretariat $secretariat): Response
    {
        return $this->render('secretariat/show.html.twig', [
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
            $entityManager->flush();

            return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('secretariat/edit.html.twig', [
            'secretariat' => $secretariat,
            'titre' => 'Edition Secretariat',
            'secretariatForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Secretariat $secretariat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $secretariat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($secretariat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('secretariat_index', [], Response::HTTP_SEE_OTHER);
    }
}
