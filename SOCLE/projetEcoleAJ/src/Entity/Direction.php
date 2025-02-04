<?php

namespace App\Entity;
use App\Entity\Secretariat;
use App\Repository\DirectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DirectionRepository::class)]
class Direction extends Personnel
{
    
}
