<?php

namespace App\Entity;

use DateTimeImmutable;

class TimeRecord implements OwnedByUserInterface
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var DateTimeImmutable Start date and time
     */
    private DateTimeImmutable $startDateTime;

    /**
     * @var DateTimeImmutable End date and time
     */
    private DateTimeImmutable $endDateTime;

    /**
     * @var string|null Note
     */
    private ?string $note = null;

    /**
     * @var Project Project
     */
    private Project $project;

    /**
     * @var Invoice|null Invoice
     */
    private ?Invoice $invoice = null;

    /**
     * @var User|null Entity owner
     */
    private ?User $owner = null;

    public function __construct()
    {
        $this->startDateTime = new DateTimeImmutable();
        $this->endDateTime = new DateTimeImmutable();
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
     * @return TimeRecord
     */
    public function setId(?int $id): TimeRecord
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    /**
     * @param DateTimeImmutable $startDateTime
     * @return TimeRecord
     */
    public function setStartDateTime(DateTimeImmutable $startDateTime): TimeRecord
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }

    /**
     * @param DateTimeImmutable $endDateTime
     * @return TimeRecord
     */
    public function setEndDateTime(DateTimeImmutable $endDateTime): TimeRecord
    {
        $this->endDateTime = $endDateTime;

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
     * @return TimeRecord
     */
    public function setNote(?string $note): TimeRecord
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return TimeRecord
     */
    public function setProject(Project $project): TimeRecord
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     * @return TimeRecord
     */
    public function setInvoice(?Invoice $invoice): TimeRecord
    {
        $this->invoice = $invoice;

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
     * @return TimeRecord
     */
    public function setOwner(?User $owner): TimeRecord
    {
        $this->owner = $owner;

        return $this;
    }
}
