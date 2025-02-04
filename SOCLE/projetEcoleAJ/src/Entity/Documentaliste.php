<?php

namespace App\Entity;

use App\Entity\Personnel;
use App\Repository\DocumentalisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentalisteRepository::class)]
class Documentaliste extends Personnel
{

}
