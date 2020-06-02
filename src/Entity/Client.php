<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Client implements OwnedByUserInterface
{
    /**
     * @var integer|null Id
     */
    private ?int $id;

    /**
     * @var string Name
     */
    private string $name;

    /**
     * @var string Street and street number
     */
    private string $street;

    /**
     * @var string City
     */
    private string $city;

    /**
     * @var int Postal code
     */
    private int $postalCode;

    /**
     * @var int|null Company identification number
     */
    private ?int $cidNumber;

    /**
     * @var int|null Tax identification number
     */
    private ?int $taxNumber;

    /**
     * @var string|null Contact e-mail
     */
    private ?string $contactEmail;

    /**
     * @var string|null Contact phone number
     */
    private ?string $contactPhoneNumber;

    /**
     * @var User|null Entity owner
     */
    private ?User $owner = null;

    /**
     * @var Collection
     */
    private Collection $projects;

    public function __construct()
    {
        $this->name = '';
        $this->street = '';
        $this->city = '';
        $this->postalCode = 0;
        $this->projects = new ArrayCollection();
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
     * @return Client
     */
    public function setId(?int $id): Client
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Client
     */
    public function setName(string $name): Client
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Client
     */
    public function setStreet(string $street): Client
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Client
     */
    public function setCity(string $city): Client
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return int
     */
    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     * @return Client
     */
    public function setPostalCode(int $postalCode): Client
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCidNumber(): ?int
    {
        return $this->cidNumber;
    }

    /**
     * @param int|null $cidNumber
     * @return Client
     */
    public function setCidNumber(?int $cidNumber): Client
    {
        $this->cidNumber = $cidNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTaxNumber(): ?int
    {
        return $this->taxNumber;
    }

    /**
     * @param int|null $taxNumber
     * @return Client
     */
    public function setTaxNumber(?int $taxNumber): Client
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    /**
     * @param string|null $contactEmail
     * @return Client
     */
    public function setContactEmail(?string $contactEmail): Client
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactPhoneNumber(): ?string
    {
        return $this->contactPhoneNumber;
    }

    /**
     * @param string|null $contactPhoneNumber
     * @return Client
     */
    public function setContactPhoneNumber(?string $contactPhoneNumber): Client
    {
        $this->contactPhoneNumber = $contactPhoneNumber;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getOwner(): ?User
    {
        return $this->owner;
    }

    /**
     * @param User|null $owner
     * @return Client
     */
    public function setOwner(?User $owner): Client
    {
        $this->owner = $owner;

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
     * @return Client
     */
    public function setProjects(Collection $projects): Client
    {
        $this->projects = $projects;

        return $this;
    }
}
