<?php

namespace App\Controller\Cantine;

use App\Entity\Cantine\Entree;
use App\Entity\Cantine\Plat;
use App\Entity\Cantine\Fromage;
use App\Entity\Cantine\Dessert;
use App\Entity\Cantine\Menu;
use App\Repository\Cantine\MenuRepository;
use App\Form\Cantine\MenuType;
use App\Repository\Cantine\EntreeRepository;
use App\Repository\Cantine\PlatRepository;
use App\Repository\Cantine\FromageRepository;
use App\Repository\Cantine\DessertRepository;

use Doctrine\ORM\EntityManagerInterface;
;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/menu', name: 'menu_')]
class MenuController extends AbstractController
{
    
    protected $entityManager;
    
    function __construct(
        EntityManagerInterface $entityManager,
    ){
        $this->entityManager = $entityManager;
    }

    #[Route('/index', name: 'index')]
    public function index(MenuRepository $menuRepo): Response
    {
	
        return $this->render('cantine/menu/index.html.twig', [
            'controller_name' => 'MenuController',
            'titre' =>'Menu',
            'menus' => $menuRepo->findAll(),
        ]);
    }

    
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new (Request $request): Response
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entreeId = $form->get('entree_id')->getData(); // This will give you the ID (a string)
            $entree = $this->entityManager->getRepository(Entree::class)->find($entreeId); // Fetch the actual Entree object by ID
            if ($entree instanceof Entree){
                $menu->setEntree($entree);
            }
            $platId = $form->get('plat_id')->getData(); // This will give you the ID (a string)
            $plat = $this->entityManager->getRepository(Plat::class)->find($platId); // Fetch the actual Entree object by ID
            if ($plat instanceof Plat){
                $menu->setPlat($plat);
            }
            $fromageId = $form->get('fromage_id')->getData(); // This will give you the ID (a string)
            $fromage = $this->entityManager->getRepository(Fromage::class)->find($fromageId); // Fetch the actual Entree object by ID
            if ($fromage instanceof Fromage){
                 $menu->setFromage($fromage);
            }
            $dessertId = $form->get('dessert_id')->getData(); // This will give you the ID (a string)
            $dessert = $this->entityManager->getRepository(Dessert::class)->find($dessertId); // Fetch the actual Entree object by ID
            if ($dessert instanceof Dessert){
                $menu->setDessert($dessert);
            }
            $this->entityManager->persist($menu);
            $this->entityManager->flush();

            return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/menu/new.html.twig', [
            'menu' => $menu,
            'titre' => 'Nouveau Menu',
            'menuForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'affichage', methods: ['GET'])]
    public function show(Menu $menu): Response
    {
        return $this->render('cantine/menu/show.html.twig', [
            'menu' => $menu,
            'titre' =>'Affichage '.$menu->getLibelle(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edition', methods: ['GET', 'POST'])]
    public function edit(Request $request, Menu $menu): Response
    {
        $form = $this->createForm(menuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cantine/menu/edit.html.twig', [
            'menu' => $menu,
            'titre' =>'Edition Menu',
            'menuForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'suppression', methods: ['POST'])]
    public function delete(Request $request, Menu $menu): Response
    {
        if ($this->isCsrfTokenValid('delete' . $menu->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($menu);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/entreeLibelle/{libelle}', name: 'getEntreeLibelle', methods: ['GET'])]
    public function getEntreeLibelle(string $libelle, EntreeRepository $entreeRepo): Response
    {
        $data=$entreeRepo->getLibelle($libelle);
        return $this->json($data);
    }
    
    #[Route('/platLibelle/{libelle}', name: 'getplatLibelle', methods: ['GET'])]
    public function getPlatLibelle(string $libelle, PlatRepository $platRepo): Response
    {
        $data=$platRepo->getLibelle($libelle);
        return $this->json($data);
    }

    #[Route('/fromageLibelle/{libelle}', name: 'getFromageLibelle', methods: ['GET'])]
    public function getFromageLibelle(string $libelle, FromageRepository $fromageRepo): Response
    {
        $data=$fromageRepo->getLibelle($libelle);
        return $this->json($data);
    }

    #[Route('/dessertLibelle/{libelle}', name: 'getDessertLibelle', methods: ['GET'])]
    public function getDessertLibelle(string $libelle, DessertRepository $dessertRepo): Response
    {
        $data=$dessertRepo->getLibelle($libelle);
        return $this->json($data);
    }

}
