<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    const ROLE_USER =  'ROLE_USER';
    const ROLE_ADMIN =  'ROLE_ADMIN';
    const ROLE_SUPER_ADMIN =  'ROLE_SUPER_ADMIN';

    /**
     * @var integer|null Id
     */
    private ?int $id;

    /**
     * @var string First name
     */
    private string $firstName;

    /**
     * @var string Last name
     */
    private string $lastName;

    /**
     * @var string E-mail
     */
    private string $email;

    /**
     * @var string Username
     */
    private string $username;

    /**
     * @var string Password
     */
    private string $password;

    /**
     * @var string|null Plain password
     */
    private ?string $plainPassword;

    /**
     * @var bool Is user account active
     */
    private bool $isActive;

    /**
     * @var string[] User roles
     */
    private array $roles = [];

    /**
     * @var Collection Clients
     */
    private Collection $clients;

    /**
     * @var Collection Clients
     */
    private Collection $projects;

    /**
     * @var Collection Invoices
     */
    private Collection $invoices;

    public function __construct()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->username = '';
        $this->password = '';
        $this->plainPassword = null;
        $this->isActive = false;
        $this->roles = [self::ROLE_USER];
        $this->clients = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->invoices = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(?int $id): User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     * @return User
     */
    public function setPlainPassword(?string $plainPassword): User
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive(bool $isActive): User
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = self::ROLE_USER;

        return array_unique($roles);
    }

    /**
     * @param string[] $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    /**
     * @return Collection
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    /**
     * @param Collection $clients
     * @return User
     */
    public function setClients(Collection $clients): User
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    /**
     * @param Collection $projects
     * @return User
     */
    public function setProjects(Collection $projects): User
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    /**
     * @param Collection $invoices
     * @return User
     */
    public function setInvoices(Collection $invoices): User
    {
        $this->invoices = $invoices;

        return $this;
    }
}
