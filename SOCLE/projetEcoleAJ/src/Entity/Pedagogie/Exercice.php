<?php

namespace App\Entity\Pedagogie;

use App\Repository\Pedagogie\ExerciceRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int{
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface{
        return $this->date;
    }
    public function setDate(\DateTimeInterface $date): static{
        $this->date = $date;
        return $this;
    }
}
