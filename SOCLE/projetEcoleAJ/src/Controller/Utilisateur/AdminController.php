<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;

use App\Entity\Utilisateur\Admin;

USE App\Form\Utilisateur\AdminType;
use App\Repository\Utilisateur\AdminRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{

        private $passwordHasher;

        public function __construct(UserPasswordHasherInterface $passwordHasher){
            $this -> passwordHasher=$passwordHasher;
        }


    #[Route('/index', name: 'index')]
    public function index(AdminRepository $adminRepo): Response
    {
        return $this->render('Utilisateur/admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'titre' => 'Admin',
            'admins' => $adminRepo->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {


        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $admin->setRoles(["ROLE_ADMIN"]);
            $admin->setPassword($this->passwordHasher->hashPassword($admin, $admin->getPassword()));
             
            $getter =new CouteauSuisse();
            $username= $getter->getUsername($admin);
            $email =$getter->getEmail($admin, $username);
            $admin->setUsername($username);
            $admin->setEmail($email);

            $entityManager->persist($admin);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/admin/new.html.twig', [
            'admin' => $admin,
            'titre' => 'Nouvel Admin',
            'adminForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Admin $admin): Response
    {
        return $this->render('Utilisateur/admin/show.html.twig', [
            'admin' => $admin,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, admin $admin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $admin->setPassword($this->passwordHasher->hashPassword($admin, $admin->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/admin/edit.html.twig', [
            'admin' => $admin,
            'titre' => 'Edition Membre',
            'adminForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $admin->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($admin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
