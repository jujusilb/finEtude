<?php

namespace App\Entity;

use App\Entity\Personnel;
use App\Entity\ProfesseurMatiere;
use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([
    "professeur" => Professeur::class, 
    "referent" => Referent::class, 
    ])]
class Professeur extends Personnel{

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


    #[ORM\OneToOne(mappedBy: 'professeur', cascade: ['persist', 'remove'])]
    private ?Referent $referent = null;

    /**
     * @var Collection<int, ProfesseurMatiere>
     */
    #[ORM\OneToMany(targetEntity: ProfesseurMatiere::class, mappedBy: 'professeur')]
    private Collection $professeurMatiere;

    /**
     * @var Collection<int, Programme>
     */
    #[ORM\OneToMany(targetEntity: Programme::class, mappedBy: 'professeur')]
    private Collection $programme;

      #[ORM\Column]
    private ?string $login = null;

    public function __construct()
    {
        //$this->createdAt = new \DateTimeImmutable();  // Initialise la date de création
        $this->professeurMatiere = new ArrayCollection();
        $this->programme = new ArrayCollection();

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




    public function getReferent(): ?Referent
    {
        return $this->referent;
    }

    public function setReferent(?Referent $referent): static
    {
        // unset the owning side of the relation if necessary
        if ($referent === null && $this->referent !== null) {
            $this->referent->setProfesseur(null);
        }

        if ($referent !== null && $referent->getProfesseur() !== $this) {
            $referent->setProfesseur($this);
        }

        $this->referent = $referent;

        return $this;
    }

    /**
     * @return Collection<int, ProfesseurMatiere>
     */
    public function getProfesseurMatiere(): Collection
    {
        return $this->professeurMatiere;
    }

    public function addProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if (!$this->professeurMatiere->contains($professeurMatiere)) {
            $this->professeurMatiere->add($professeurMatiere);
            $professeurMatiere->setProfesseur($this);
        }

        return $this;
    }

    public function removeProfesseurMatiere(ProfesseurMatiere $professeurMatiere): static
    {
        if ($this->professeurMatiere->removeElement($professeurMatiere)) {
            // set the owning side to null (unless already changed)
            if ($professeurMatiere->getProfesseur() === $this) {
                $professeurMatiere->setProfesseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Programme>
     */
    public function getProgramme(): Collection
    {
        return $this->programme;
    }

    public function addProgramme(Programme $programme): static
    {
        if (!$this->programme->contains($programme)) {
            $this->programme->add($programme);
            $programme->setProfesseur($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): static
    {
        if ($this->programme->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getProfesseur() === $this) {
                $programme->setProfesseur(null);
            }
        }

        return $this;
    }









}
