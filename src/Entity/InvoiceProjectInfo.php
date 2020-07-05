<?php

namespace App\Entity;

class InvoiceProjectInfo
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
     * @var Invoice|null Invoice
     */
    private ?Invoice $invoice = null;

    /**
     * @var Project|null Original entity
     */
    private ?Project $original = null;

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
     * @return InvoiceProjectInfo
     */
    public function setId(?int $id): InvoiceProjectInfo
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
     * @return InvoiceProjectInfo
     */
    public function setName(string $name): InvoiceProjectInfo
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
     * @return InvoiceProjectInfo
     */
    public function setInvoice(?Invoice $invoice): InvoiceProjectInfo
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Project|null
     */
    public function getOriginal(): ?Project
    {
        return $this->original;
    }

    /**
     * @param Project|null $original
     * @return InvoiceProjectInfo
     */
    public function setOriginal(?Project $original): InvoiceProjectInfo
    {
        $this->original = $original;

        return $this;
    }
}
