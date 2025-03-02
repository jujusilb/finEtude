<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Membre;
use App\Repository\Utilisateur\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends Membre {
    
    public function __construct(){
        parent::__construct();
    }
}
