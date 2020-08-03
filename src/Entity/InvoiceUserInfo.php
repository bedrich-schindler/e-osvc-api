<?php

namespace App\Entity;

class InvoiceUserInfo
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var string First name
     */
    private string $firstName;

    /**
     * @var string Last name
     */
    private string $lastName;

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
     * @var int Company identification number
     */
    private int $cidNumber;

    /**
     * @var string|null Tax identification number
     */
    private ?string $taxNumber = null;

    /**
     * @var string Bank account
     */
    private string $bankAccount;

    /**
     * @var Invoice|null Invoice
     */
    private ?Invoice $invoice = null;

    public function __construct()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->street = '';
        $this->city = '';
        $this->postalCode = 0;
        $this->cidNumber = 0;
        $this->bankAccount = '';
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
     * @return InvoiceUserInfo
     */
    public function setId(?int $id): InvoiceUserInfo
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
     * @return InvoiceUserInfo
     */
    public function setFirstName(string $firstName): InvoiceUserInfo
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
     * @return InvoiceUserInfo
     */
    public function setLastName(string $lastName): InvoiceUserInfo
    {
        $this->lastName = $lastName;

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
     * @return InvoiceUserInfo
     */
    public function setStreet(string $street): InvoiceUserInfo
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
     * @return InvoiceUserInfo
     */
    public function setCity(string $city): InvoiceUserInfo
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
     * @return InvoiceUserInfo
     */
    public function setPostalCode(int $postalCode): InvoiceUserInfo
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getCidNumber(): int
    {
        return $this->cidNumber;
    }

    /**
     * @param int $cidNumber
     * @return InvoiceUserInfo
     */
    public function setCidNumber(int $cidNumber): InvoiceUserInfo
    {
        $this->cidNumber = $cidNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * @param string|null $taxNumber
     * @return InvoiceUserInfo
     */
    public function setTaxNumber(?string $taxNumber): InvoiceUserInfo
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccount(): string
    {
        return $this->bankAccount;
    }

    /**
     * @param string $bankAccount
     * @return InvoiceUserInfo
     */
    public function setBankAccount(string $bankAccount): InvoiceUserInfo
    {
        $this->bankAccount = $bankAccount;

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
     * @return InvoiceUserInfo
     */
    public function setInvoice(?Invoice $invoice): InvoiceUserInfo
    {
        $this->invoice = $invoice;

        return $this;
    }
}
