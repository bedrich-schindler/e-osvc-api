<?php

namespace App\Entity;

class UserNotifications
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var bool Health insurance notification - enabled
     */
    private bool $healthInsuranceEnabled;

    /**
     * @var int Health insurance notification - day of month
     */
    private int $healthInsuranceDayOfMonth;

    /**
     * @var bool Sickness insurance notification - enabled
     */
    private bool $sicknessInsuranceEnabled;

    /**
     * @var int Sickness insurance notification - day of month
     */
    private int $sicknessInsuranceDayOfMonth;

    /**
     * @var bool Social insurance notification - enabled
     */
    private bool $socialInsuranceEnabled;

    /**
     * @var int Social insurance notification - day of month
     */
    private int $socialInsuranceDayOfMonth;

    /**
     * @var bool Tax notification - enabled
     */
    private bool $taxEnabled;

    /**
     * @var int Tax notification - day of month
     */
    private int $taxDayOfMonth;

    /**
     * @var bool Overdue invoice - enabled
     */
    private bool $overdueInvoiceEnabled;

    /**
     * @var User|null User
     */
    private ?User $user = null;

    public function __construct()
    {
        $this->healthInsuranceEnabled = false;
        $this->healthInsuranceDayOfMonth = 1;
        $this->sicknessInsuranceEnabled = false;
        $this->sicknessInsuranceDayOfMonth = 1;
        $this->socialInsuranceEnabled = false;
        $this->socialInsuranceDayOfMonth = 1;
        $this->taxEnabled = false;
        $this->taxDayOfMonth = 1;
        $this->overdueInvoiceEnabled = false;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return UserNotifications
     */
    public function setId(?int $id): UserNotifications
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHealthInsuranceEnabled(): bool
    {
        return $this->healthInsuranceEnabled;
    }

    /**
     * @param bool $healthInsuranceEnabled
     * @return UserNotifications
     */
    public function setHealthInsuranceEnabled(bool $healthInsuranceEnabled): UserNotifications
    {
        $this->healthInsuranceEnabled = $healthInsuranceEnabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getHealthInsuranceDayOfMonth(): int
    {
        return $this->healthInsuranceDayOfMonth;
    }

    /**
     * @param int $healthInsuranceDayOfMonth
     * @return UserNotifications
     */
    public function setHealthInsuranceDayOfMonth(int $healthInsuranceDayOfMonth): UserNotifications
    {
        $this->healthInsuranceDayOfMonth = $healthInsuranceDayOfMonth;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSicknessInsuranceEnabled(): bool
    {
        return $this->sicknessInsuranceEnabled;
    }

    /**
     * @param bool $sicknessInsuranceEnabled
     * @return UserNotifications
     */
    public function setSicknessInsuranceEnabled(bool $sicknessInsuranceEnabled): UserNotifications
    {
        $this->sicknessInsuranceEnabled = $sicknessInsuranceEnabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getSicknessInsuranceDayOfMonth(): int
    {
        return $this->sicknessInsuranceDayOfMonth;
    }

    /**
     * @param int $sicknessInsuranceDayOfMonth
     * @return UserNotifications
     */
    public function setSicknessInsuranceDayOfMonth(int $sicknessInsuranceDayOfMonth): UserNotifications
    {
        $this->sicknessInsuranceDayOfMonth = $sicknessInsuranceDayOfMonth;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSocialInsuranceEnabled(): bool
    {
        return $this->socialInsuranceEnabled;
    }

    /**
     * @param bool $socialInsuranceEnabled
     * @return UserNotifications
     */
    public function setSocialInsuranceEnabled(bool $socialInsuranceEnabled): UserNotifications
    {
        $this->socialInsuranceEnabled = $socialInsuranceEnabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getSocialInsuranceDayOfMonth(): int
    {
        return $this->socialInsuranceDayOfMonth;
    }

    /**
     * @param int $socialInsuranceDayOfMonth
     * @return UserNotifications
     */
    public function setSocialInsuranceDayOfMonth(int $socialInsuranceDayOfMonth): UserNotifications
    {
        $this->socialInsuranceDayOfMonth = $socialInsuranceDayOfMonth;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxEnabled(): bool
    {
        return $this->taxEnabled;
    }

    /**
     * @param bool $taxEnabled
     * @return UserNotifications
     */
    public function setTaxEnabled(bool $taxEnabled): UserNotifications
    {
        $this->taxEnabled = $taxEnabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getTaxDayOfMonth(): int
    {
        return $this->taxDayOfMonth;
    }

    /**
     * @param int $taxDayOfMonth
     * @return UserNotifications
     */
    public function setTaxDayOfMonth(int $taxDayOfMonth): UserNotifications
    {
        $this->taxDayOfMonth = $taxDayOfMonth;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOverdueInvoiceEnabled(): bool
    {
        return $this->overdueInvoiceEnabled;
    }

    /**
     * @param bool $overdueInvoiceEnabled
     * @return UserNotifications
     */
    public function setOverdueInvoiceEnabled(bool $overdueInvoiceEnabled): UserNotifications
    {
        $this->overdueInvoiceEnabled = $overdueInvoiceEnabled;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return UserNotifications
     */
    public function setUser(?User $user): UserNotifications
    {
        $this->user = $user;

        return $this;
    }
}
