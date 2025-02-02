<?php

namespace App\Entity;

use App\Entity\Adulte;
use App\Repository\ParentEleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParentEleveRepository::class)]
class ParentEleve extends Adulte
{
    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Eleve>
     */
    #[ORM\ManyToMany(targetEntity: Eleve::class, inversedBy: 'parentEleves')]
    private Collection $eleves;

    #[ORM\Column]
    private ?string $login = null;

        public function __construct()
    {
        parent::__construct();
        $this->eleves = new ArrayCollection();
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

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addEleve(Eleve $eleves): static
    {
        if (!$this->eleves->contains($eleves)) {
            $this->eleves->add($eleves);
        }

        return $this;
    }

    public function removeEleves(Eleve $eleves): static
    {
        $this->eleves->removeElement($eleves);

        return $this;
    }
}
