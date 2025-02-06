<?php

namespace App\Entity\Utilisateur;

use app\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Personnel;
use App\Repository\SecretariatRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: SecretariatRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "secretariat" => Secretariat::class,
    'direction' => Direction::class
    ])]
class Secretariat extends Personnel {

}
