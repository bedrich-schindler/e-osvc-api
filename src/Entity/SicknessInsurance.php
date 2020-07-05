<?php

namespace App\Entity;

use DateTimeImmutable;
use InvalidArgumentException;

class SicknessInsurance implements OwnedByUserInterface
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
     * @return SicknessInsurance
     */
    public function setId(?int $id): SicknessInsurance
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
     * @return SicknessInsurance
     */
    public function setDate(DateTimeImmutable $date): SicknessInsurance
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
     * @return SicknessInsurance
     */
    public function setAmount(float $amount): SicknessInsurance
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
     * @return SicknessInsurance
     */
    public function setVariant(string $variant): SicknessInsurance
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
     * @return SicknessInsurance
     */
    public function setNote(?string $note): SicknessInsurance
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
     * @return SicknessInsurance
     */
    public function setOwner(?User $owner): SicknessInsurance
    {
        $this->owner = $owner;

        return $this;
    }
}
