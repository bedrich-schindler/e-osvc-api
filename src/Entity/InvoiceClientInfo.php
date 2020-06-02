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
