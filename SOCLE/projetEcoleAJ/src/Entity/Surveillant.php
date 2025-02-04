<?php

namespace App\Entity;

use App\Entity\Personnel;
use App\Repository\SurveillantRepository;
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
   
}
