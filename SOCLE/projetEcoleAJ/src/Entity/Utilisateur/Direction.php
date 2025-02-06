<?php

namespace App\Entity\Utilisateur;
use App\Entity\Utilisateur\Secretariat;
use App\Repository\Utilisateur\DirectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DirectionRepository::class)]
class Direction extends Personnel
{
    
}
