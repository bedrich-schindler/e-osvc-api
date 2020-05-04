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
