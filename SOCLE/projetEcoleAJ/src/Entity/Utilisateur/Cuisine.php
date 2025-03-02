<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\CuisineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuisineRepository::class)]
class Cuisine extends Personnel
{
    public function __construct(){
        parent::__construct();
    }
}
