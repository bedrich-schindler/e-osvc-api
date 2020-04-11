<?php

namespace App\Entity;

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

    public function __construct()
    {
        $this->name = '';
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
}
