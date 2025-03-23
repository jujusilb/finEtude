<?php

namespace App\Entity\Communication;

use App\Entity\Utilisateur\Membre;
use App\Repository\Communication\MessageGeneralRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageGeneralRepository::class)]
class MessageGeneral extends Message
{


    #[ORM\ManyToOne(inversedBy: 'messageGenerals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $expediteur = null;

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
}
