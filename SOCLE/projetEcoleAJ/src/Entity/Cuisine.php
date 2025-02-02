<?php

namespace App\Entity;

use App\Entity\Personnel;
use App\Repository\CuisineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuisineRepository::class)]
class Cuisine extends Personnel
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

    #[ORM\Column]
    private ?string $login = null;

    
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
}
