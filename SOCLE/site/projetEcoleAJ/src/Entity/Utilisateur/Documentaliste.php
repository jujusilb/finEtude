<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\DocumentalisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentalisteRepository::class)]
class Documentaliste extends Personnel
{
    public function __construct(){
        parent::__construct();
    }
}
