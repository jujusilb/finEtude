<?php

namespace App\Controller\Cuisine;

use App\Entity\Cuisine\Menu;
use App\Repository\Cuisine\MenuRepository;
use App\Form\Cuisine\MenuType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/menu', name: 'menu_')]
class MenuController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MenuRepository $menuRepo): Response
    {
	
        return $this->render('cuisine/menu/index.html.twig', [
            'controller_name' => 'MenuController',
            'titre' =>'Menu',
            'menus' => $menuRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request, EntityManagerInterface $entityManager): Response
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($menu);
            $entityManager->flush();

            return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/menu/new.html.twig', [
            'menu' => $menu,
            'titre' => 'Nouveau Menu',
            'menuForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Menu $menu): Response
    {
        return $this->render('cuisine/menu/show.html.twig', [
            'menu' => $menu,
            'titre' =>'Affichage Menu',
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Menu $menu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(menuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cuisine/menu/edit.html.twig', [
            'menu' => $menu,
            'titre' =>'Edition Menu',
            'menuForm' => $form,
        ]);
    }

    #[Route('/{id}', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Menu $menu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $menu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($menu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
    }
}
