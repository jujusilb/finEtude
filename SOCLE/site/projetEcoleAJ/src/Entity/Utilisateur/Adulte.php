<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\User;
use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Insertion;
use App\Entity\Utilisateur\Membre;
use App\Entity\Utilisateur\Personnel;
use App\Entity\Utilisateur\ParentEleve;
use App\Repository\Utilisateur\AdulteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdulteRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    'adulte' =>Adulte::class, 
        'parentEleve' =>ParentEleve::class,
        'personnel' => Personnel::class,
            "cuisine" => cuisine::class, 
            "documentaliste" => Documentaliste::class, 
            "professeur"=>Professeur::class, 
            "secretariat" => Secretariat::class,
                'direction' =>Direction::class, 
            'surveillant' => Surveillant::class,
            'insertion' => Insertion::class
    ])]
class Adulte extends Membre
{
    public function __construct(){
        parent::__construct();
    }
}
