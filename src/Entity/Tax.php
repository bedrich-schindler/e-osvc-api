<?php

namespace App\Entity;

use DateTimeImmutable;
use InvalidArgumentException;

class Tax implements OwnedByUserInterface
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var DateTimeImmutable Date
     */
    private DateTimeImmutable $date;

    /**
     * @var float Amount
     */
    private float $amount;

    /**
     * @var string Variant
     */
    private string $variant;

    /**
     * @var string|null Note
     */
    private ?string $note = null;

    /**
     * @var User|null Entity owner
     */
    private ?User $owner = null;

    public function __construct()
    {
        $this->date = new DateTimeImmutable();
        $this->amount = 0;
        $this->variant = '';
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
     * @return Tax
     */
    public function setId(?int $id): Tax
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param DateTimeImmutable $date
     * @return Tax
     */
    public function setDate(DateTimeImmutable $date): Tax
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Tax
     */
    public function setAmount(float $amount): Tax
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariant(): string
    {
        return $this->variant;
    }

    /**
     * @param string $variant
     * @return Tax
     */
    public function setVariant(string $variant): Tax
    {
        if (!in_array($variant, InsuranceVariant::getVariants())) {
            throw new InvalidArgumentException(sprintf(
                '%s in not supported variant',
                $variant,
            ));
        }

        $this->variant = $variant;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return Tax
     */
    public function setNote(?string $note): Tax
    {
        $this->note = $note;

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
     * @return Tax
     */
    public function setOwner(?User $owner): Tax
    {
        $this->owner = $owner;

        return $this;
    }
}