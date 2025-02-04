<?php

namespace App\Entity;

use App\Entity\Personnel;
use App\Repository\CuisineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuisineRepository::class)]
class Cuisine extends Personnel
{
    
}
