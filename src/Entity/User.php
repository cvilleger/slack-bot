<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @Assert\NotBlank
     *
     * @ORM\Column(unique=true)
     */
    private string $googleId;

    /**
     * @Assert\Type(type="array")
     *
     * @ORM\Column(type="simple_array")
     */
    private array $roles;

    /**
     * @Assert\Email
     *
     * @ORM\Column
     */
    private string $email;

    /**
     * @Assert\NotBlank
     *
     * @ORM\Column
     */
    private string $firstname;

    /**
     * @Assert\NotBlank
     *
     * @ORM\Column
     */
    private string $lastname;

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGoogleId(): string
    {
        return $this->googleId;
    }

    public function setGoogleId(string $googleId): self
    {
        $this->googleId = $googleId;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function getPassword(): void
    {
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials(): void
    {
    }
}
