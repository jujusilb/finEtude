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
    private ?Membre $expediteur = null;

    #[ORM\Column]
    private ?bool $privatif = null;

    #[ORM\ManyToOne(inversedBy: 'message')]
    private ?Thread $thread = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Membre $destinataire = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

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

    public function getExpediteur(): ?Membre {
        return $this->expediteur;
    }
    public function setExpediteur(?Membre $expediteur): static {
        $this->expediteur = $expediteur;

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

    public function getThread(): ?Thread
    {
        return $this->thread;
    }

    public function setThread(?Thread $thread): static
    {
        $this->thread = $thread;

        return $this;
    }

    public function getDestinataire(): ?Membre
    {
        return $this->destinataire;
    }

    public function setDestinataire(?Membre $destinataire): static
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
