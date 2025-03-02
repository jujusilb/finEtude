<?php

namespace App\Entity\Utilisateur;

use App\Repository\Utilisateur\SecretariatRepository;
use app\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Personnel;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: SecretariatRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "secretariat" => Secretariat::class,
    'direction' => Direction::class
    ])]
class Secretariat extends Personnel {
    public function __construct()
    {
        parent::__construct();
    }
}
