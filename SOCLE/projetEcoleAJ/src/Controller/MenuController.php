<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Menu;
use App\Repository\Entree;
use App\Repository\Plat;
use App\Repository\Viande;
use App\Repository\Legume;
use App\Repository\Fromage;
use App\Repository\Dessert;
use App\Repository\MenuRepository;
use App\Form\MenuType;
use App\Repository\DessertRepository;
use App\Repository\EntreeRepository;
use App\Repository\FromageRepository;
use App\Repository\LegumeRepository;
use App\Repository\PlatRepository;
use App\Repository\ViandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/menu', name: 'menu_')]
class MenuController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        MenuRepository $menuRepo,
        EntreeRepository $entreeRepo,
        PlatRepository $platRepo,
        ViandeRepository $viandeRepo,
        LegumeRepository $legumeRepo,
        FromageRepository $fromageRepo,
        DessertRepository $dessertRepo
        ): Response
    {
	
        return $this->render('Menu/index.html.twig', [
            'controller_name' => 'MenuController',
		    'menus' => $menuRepo->findAll(),
            'entrees' => $entreeRepo->findAll(),
            'plats' => $platRepo->findAll(),
            'viandes' => $viandeRepo->findAll(),
            'legumes' => $legumeRepo->findAll(),
            'fromages' => $fromageRepo->findAll(),
            'dessert' => $dessertRepo->findAll(),
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

        return $this->render('menu/new.html.twig', [
            'menu' => $menu,
            'menuForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'affichage', methods: ['GET'])]
    public function show(Menu $menu): Response
    {
        return $this->render('menu/show.html.twig', [
            'menu' => $menu,
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

        return $this->render('menu/edit.html.twig', [
            'menu' => $menu,
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
