<?php

namespace App\Entity\Utilisateur;

use App\Repository\Utilisateur\ROLERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ROLERepository::class)]
class ROLE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
