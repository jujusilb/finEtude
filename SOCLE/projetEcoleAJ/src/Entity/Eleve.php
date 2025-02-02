<?php

namespace App\Entity;

use App\Entity\Membre;
use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve extends Membre
{
    #[ORM\Column(length: 180)]
    private ?string $email = null;
    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;
    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];



    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotion $promotion = null;

    /**
     * @var Collection<int, ParentEleve>
     */
    #[ORM\ManyToMany(targetEntity: ParentEleve::class, mappedBy: 'eleve')]
    private Collection $parentEleves;



    #[ORM\Column]
    private ?string $login = null;

        public function __construct()
    {
        parent::__construct();
        $this->parentEleves = new ArrayCollection();
    }

    public function getLogin(): ?string{
        return $this->login;
    }
    public function setLogin(string $login): static{
        $this->login = $login;
        return $this;
    }




    public function getEmail(): ?string{
        return $this->email;
    }
    public function setEmail(string $email): static{
        $this->email = $email;
        return $this;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array{
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }
    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static{
        $this->roles = $roles;
        return $this;
    }
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string{
        return $this->password;
    }
    public function setPassword(string $password): static{
        $this->password = $password;
        return $this;
    }

    public function getPromotion(): ?Promotion{
        return $this->promotion;
    }
    public function setPromotion(?Promotion $promotion): static{
        $this->promotion = $promotion;
        return $this;
    }

    /**
     * @return Collection<int, ParentEleve>
     */
    public function getParentEleves(): Collection
    {
        return $this->parentEleves;
    }

    public function addParentElefe(ParentEleve $parentElefe): static
    {
        if (!$this->parentEleves->contains($parentElefe)) {
            $this->parentEleves->add($parentElefe);
            $parentElefe->addEleve($this);
        }

        return $this;
    }

    public function removeParentElefe(ParentEleve $parentElefe): static
    {
        if ($this->parentEleves->removeElement($parentElefe)) {
            $parentElefe->removeEleve($this);
        }

        return $this;
    }
}
