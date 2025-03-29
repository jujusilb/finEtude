<?php

namespace App\Controller\Utilisateur;

use App\Repository\Utilisateur\UserRepository;
use App\Form\Utilisateur\Pass\UserPassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Utilisateur\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/user', name: 'user_')]
final class UserController extends AbstractController
{


    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('utilisateur/user/index.html.twig', [
            'controller_name' => 'UserController',
            'titre' => 'User',
        ]);
    }

    #[Route('/{mail}/newPass', name: 'newPass')]
    public function newPass(Request $request, $mail): Response
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $mail]);

        if (!$user) {
            throw new NotFoundHttpException('Utilisateur non trouvé.');
        }

        $form = $this->createForm(UserPassType::class, $user, ['validation_groups' => ['creation']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $user->getPassword()));
            $this->entityManager->flush();

            $this->addFlash('success', 'Mot de passe modifié avec succès.');

            return $this->redirectToRoute('user_index');
        }

        return $this->render('utilisateur/user/new.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'titre' => 'Nouveau pass',
        ]);
    }


    
}