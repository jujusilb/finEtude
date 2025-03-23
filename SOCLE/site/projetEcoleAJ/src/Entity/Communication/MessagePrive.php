<?php

namespace App\Entity\Communication;

use App\Entity\Utilisateur\Membre;
use App\Repository\Communication\MessagePriveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagePriveRepository::class)]
class MessagePrive extends Message
{


    #[ORM\ManyToOne(inversedBy: 'messagePrives')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $expediteur = null;

    #[ORM\ManyToOne(inversedBy: 'messagePrives')]
    private ?Membre $destinataire = null;

    public function __construct(){
        parent::__construct();
    }
    
    public function getExpediteur(): ?Membre
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Membre $expediteur): static
    {
        $this->expediteur = $expediteur;

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
}
