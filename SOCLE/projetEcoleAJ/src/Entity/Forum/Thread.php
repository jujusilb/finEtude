<?php

namespace App\Entity\Forum;


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

    /**
     * @var Collection<int, Messages>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'thread')]
    private Collection $messages;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?Membre $createur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
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

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessages(Message $messages): static
    {
        if (!$this->messages->contains($messages)) {
            $this->messages->add($messages);
            $messages->setThread($this);
        }

        return $this;
    }

    public function removeMessage(Message $messages): static
    {
        if ($this->messages->removeElement($messages)) {
            // set the owning side to null (unless already changed)
            if ($messages->getThread() === $this) {
                $messages->setThread(null);
            }
        }

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
}
