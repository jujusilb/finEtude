<?php

namespace App\Entity\Forum;


use App\Entity\Communication\MessageForum;
use App\Entity\Forum\SubForum;
use App\Repository\Forum\ThreadRepository;
use App\Entity\Utilisateur\Membre;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThreadRepository::class)]
class Thread
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 1,
        max: 255,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $libelle = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        min: 10,
        max: 255,
        minMessage: 'La longueur minimale est de  {{ limit }} caractères',
        maxMessage: 'La longueur maximale est de  {{ limit }} caractères',
    )]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?SubForum $subForum = null;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?Membre $createur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, MessageForum>
     */
    #[ORM\OneToMany(mappedBy: 'thread', targetEntity: MessageForum::class)]
    private Collection $messageForums;

    public function __construct()
    {
       $this->messageForums = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSubForum(): ?SubForum
    {
        return $this->subForum;
    }

    public function setSubForum(?SubForum $subForum): static
    {
        $this->subForum = $subForum;

        return $this;
    }



    public function getCreateur(): ?Membre
    {
        return $this->createur;
    }

    public function setCreateur(?Membre $createur): static
    {
        $this->createur = $createur;

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

    /**
     * @return Collection<int, MessageForum>
     */
    public function getMessageForums(): Collection
    {
        return $this->messageForums;
    }

    public function addMessageForum(MessageForum $messageForum): static
    {
        if (!$this->messageForums->contains($messageForum)) {
            $this->messageForums->add($messageForum);
            $messageForum->setThread($this);
        }

        return $this;
    }

    public function removeMessageForum(MessageForum $messageForum): static
    {
        if ($this->messageForums->removeElement($messageForum)) {
            // set the owning side to null (unless already changed)
            if ($messageForum->getThread() === $this) {
                $messageForum->setThread(null);
            }
        }

        return $this;
    }
}
