<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sujet = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'message')]
    private ?Membre $membre = null;

    #[ORM\Column]
    private ?bool $privatif = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getSujet(): ?string {
        return $this->sujet;
    }
    public function setSujet(string $sujet): static {
        $this->sujet = $sujet;
        return $this;
    }

    public function getContenu(): ?string {
        return $this->contenu;
    }
    public function setContenu(string $contenu): static {
        $this->contenu = $contenu;
        return $this;
    }

    public function getMembre(): ?Membre {
        return $this->membre;
    }
    public function setMembre(?Membre $Membre): static {
        $this->membre = $Membre;
        return $this;
    }

    public function isPrivatif(): ?bool
    {
        return $this->privatif;
    }
    public function setPrivatif(bool $privatif): static
    {
        $this->privatif = $privatif;

        return $this;
    }
}
