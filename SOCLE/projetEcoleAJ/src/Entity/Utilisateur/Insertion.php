<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\InsertionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsertionRepository::class)]
class Insertion extends Personnel
{
    public function __construct(){
        parent::__construct();
    }
}
