<?php

namespace App\Entity\Communication;

use App\Entity\Forum\Thread;
use App\Entity\Communication\Message;
use App\Entity\Utilisateur\Membre;
use App\Repository\Communication\MessageForumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageForumRepository::class)]
class MessageForum extends Message
{

    #[ORM\ManyToOne(inversedBy: 'messageForums')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $expediteur = null;

    #[ORM\ManyToOne(inversedBy: 'messageForums')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Thread $thread = null;

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

    public function getThread(): ?Thread
    {
        return $this->thread;
    }

    public function setThread(?Thread $thread): static
    {
        $this->thread = $thread;

        return $this;
    }
}
