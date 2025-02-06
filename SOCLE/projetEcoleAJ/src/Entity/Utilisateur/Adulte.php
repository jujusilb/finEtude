<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Membre;
use App\Entity\Utilisateur\Personnel;
use App\Entity\Utilisateur\ParentEleve;
use App\Repository\Utilisateur\AdulteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdulteRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "adulte" =>Adulte::class, 
    "cuisine" => cuisine::class, 
    'direction' =>Direction::class,   
    "documentaliste" => Documentaliste::class, 
    "personnel" => Personnel::class,
    "parentEleve" =>ParentEleve::class,
    "Professeur"=>Professeur::class, 
    "secretariat" => Secretariat::class,
    'surveillant' => Surveillant::class
    ])]
class Adulte extends Membre
{

}
