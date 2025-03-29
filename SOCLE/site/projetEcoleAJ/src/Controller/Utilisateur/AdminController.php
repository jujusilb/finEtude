<?php

namespace App\Controller\Utilisateur;

use App\Outils\CouteauSuisse;

use App\Entity\Utilisateur\Admin;

USE App\Form\Utilisateur\AdminType;
use App\Repository\Utilisateur\AdminRepository;
use App\Entity\Boutique\MembreJeton;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{



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
    public function new (Request $request): Response
    {


        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $admin->setRoles(["ROLE_ADMIN"]);
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($admin, $tmpPass);
            $admin->setPassword($hashTmpPass);

            $getter =new CouteauSuisse();
            $username= $getter->getUsername($form->get('prenom')->getData(), $form->get('nom')->getData());
            $email =$getter->getEmail($username);
            $admin->setUsername($username);
            $admin->setEmail($email);
            if($form->get('imageFile')->getData()==NULL){
                if($form->get('civilite')->getData()=="Madame"){
                    $admin->setImageName('woman.png');
                } else if($form->get('civilite')->getData() == "Monsieur"){
                    $admin->setImageName('man.png');
                }
            }
            $this->entityManager->persist($admin);
            $listeJeton=new MembreJeton();
            $listeJeton->setMembre($admin);
            $listeJeton->setNombreJeton(0);
            $this->entityManager->persist($listeJeton);
            $this->entityManager->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/admin/new.html.twig', [
            'admin' => $admin,
            'titre' => 'Nouvel Admin',
            'adminForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Admin $admin): Response
    {
        return $this->render('Utilisateur/admin/show.html.twig', [
            'admin' => $admin,
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, admin $admin): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tmpPass=$form->get('motDePasse')->getData();
            $hashTmpPass=$this->passwordHasher->hashPassword($admin, $tmpPass);
            $admin->setPassword($hashTmpPass);
            $this->entityManager->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Utilisateur/admin/edit.html.twig', [
            'admin' => $admin,
            'titre' => 'Edition Membre',
            'adminForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Admin $admin): Response
    {
        if ($this->isCsrfTokenValid('delete' . $admin->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($admin);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
