<?php

namespace App\Entity;

use App\Entity\Direction;
use App\Entity\Meùbre;
use App\Entity\Personnel;
use App\Entity\ParentEleve;
use App\Repository\AdulteRepository;
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
