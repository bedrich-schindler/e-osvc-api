<?php

namespace App\Entity;

class InvoiceClientInfo
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
     * @var Invoice|null Invoice
     */
    private ?Invoice $invoice = null;

    /**
     * @var Client|null Original entity
     */
    private ?Client $original = null;

    public function __construct()
    {
        $this->name = '';
        $this->street = '';
        $this->city = '';
        $this->postalCode = 0;
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
     * @return InvoiceClientInfo
     */
    public function setId(?int $id): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setName(string $name): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setStreet(string $street): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setCity(string $city): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setPostalCode(int $postalCode): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setCidNumber(?int $cidNumber): InvoiceClientInfo
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
     * @return InvoiceClientInfo
     */
    public function setTaxNumber(?int $taxNumber): InvoiceClientInfo
    {
        $this->taxNumber = $taxNumber;

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
     * @return InvoiceClientInfo
     */
    public function setInvoice(?Invoice $invoice): InvoiceClientInfo
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Client|null
     */
    public function getOriginal(): ?Client
    {
        return $this->original;
    }

    /**
     * @param Client|null $original
     * @return InvoiceClientInfo
     */
    public function setOriginal(?Client $original): InvoiceClientInfo
    {
        $this->original = $original;

        return $this;
    }
}
