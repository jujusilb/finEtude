<?php

namespace App\Entity;

use App\Entity\Membre as EntityMembre;
use App\Entity\Membre;
use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends Membre {
    
}
