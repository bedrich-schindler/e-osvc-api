<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Project implements OwnedByUserInterface
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var string Name
     */
    private string $name;

    /**
     * @var Client|null
     */
    private ?Client $client = null;

    /**
     * @var User|null Entity owner
     */
    private ?User $owner = null;

    /**
     * @var Collection Time records
     */
    private Collection $timeRecords;

    public function __construct()
    {
        $this->name = '';
        $this->timeRecords = new ArrayCollection();
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
     * @return Project
     */
    public function setId(?int $id): Project
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
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     * @return Client
     */
    public function setClient(?Client $client): Project
    {
        $this->client = $client;

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
     * @return Project
     */
    public function setOwner(?User $owner): Project
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTimeRecords(): Collection
    {
        return $this->timeRecords;
    }

    /**
     * @param Collection $timeRecords
     * @return Project
     */
    public function setTimeRecords(Collection $timeRecords): Project
    {
        $this->timeRecords = $timeRecords;

        return $this;
    }
}
