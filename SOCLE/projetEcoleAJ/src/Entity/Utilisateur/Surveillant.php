<?php

namespace App\Entity\Utilisateur;

use App\Entity\Utilisateur\Personnel;
use App\Repository\Utilisateur\SurveillantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SurveillantRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "secretariat" => Secretariat::class,
    'direction' => Direction::class
    ])]
class Surveillant extends Personnel
{
    public function __construct(){
        parent::__construct();
    }
}
