<?php

namespace App\Entity;

use App\Repository\BoutiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoutiqueRepository::class)]
class Boutique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $archives = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isArchives(): ?bool
    {
        return $this->archives;
    }

    public function setArchives(bool $archives): static
    {
        $this->archives = $archives;

        return $this;
    }
}
