<?php

namespace App\Controller;

use App\Entity\Admin;

use App\Repository\AdminRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(AdminRepository $adminRepo): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'admins' => $adminRepo->findAll(),
        ]);
    }
}
