<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

abstract class MyPersonalController extends AbstractController
{

protected $passwordHasher;
protected $entityManager;

function __construct(
	EntityManagerInterface $entityManager,
	UserPasswordHasherInterface $passwordHasher
){
	$this->entityManager = $entityManager;
	$this->passwordHasher=$passwordHasher;
}
}
