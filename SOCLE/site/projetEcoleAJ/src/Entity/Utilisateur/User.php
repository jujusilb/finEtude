<?php

namespace App\Entity\Utilisateur;


use App\Entity\Utilisateur\Admin;
use App\Entity\Utilisateur\Adulte;
use App\Entity\Utilisateur\Cuisine;
use App\Entity\Utilisateur\Direction;
use App\Entity\Utilisateur\Documentaliste;
use App\Entity\Utilisateur\Eleve;
use App\Entity\Utilisateur\Insertion;
use App\Entity\Utilisateur\ParentEleve;
use App\Entity\Utilisateur\Professeur;
use App\Entity\Pedagogie\Referent;
use App\Entity\Documentaliste\Emprunt;
use App\Entity\Cuisine\Repas;
use App\Entity\Communication\Message;
use App\Entity\Forum\Thread;
use App\Entity\Utilisateur\Secretariat;
use App\Entity\Utilisateur\Surveillant;

use App\Repository\Utilisateur\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discrimination", type: "string")]
#[ORM\DiscriminatorMap([    
    "user" => User::class,
        "membre" => Membre::class,
            "admin" => Admin::class, 
            "eleve" => Eleve::class, 
            "adulte" =>Adulte::class,
                "parentEleve" =>ParentEleve::class,
                "personnel" =>Personnel::class,    
                    "cuisine" => Cuisine::class,
                    "surveillant" =>Surveillant::class,
                    "professeur" => Professeur::class,
                    "documentaliste" => Documentaliste::class,
                    'insertion' => Insertion::class,
                    "secretariat" => Secretariat::class,
                        "direction" =>Direction::class
])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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
    #[Assert\NotBlank(groups: ['creation'])]
    #[Assert\Length(min: 3, groups: ['creation', 'edition'])]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
