<?php

namespace App\Entity;

class InvoiceItem
{
    /**
     * @var integer|null Id
     */
    private ?int $id = null;

    /**
     * @var int Quantity
     */
    private int $quantity;

    /**
     * @var float Price per quantity unit
     */
    private float $pricePerQuantityUnit;

    /**
     * @var string Quantity unit
     */
    private ?string $quantityUnit = null;

    /**
     * @var string Note
     */
    private string $note;

    /**
     * @var Invoice|null Invoice
     */
    private ?Invoice $invoice = null;

    public function __construct()
    {
        $this->quantity = 0;
        $this->pricePerQuantityUnit = 0;
        $this->note = '';
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
     * @return InvoiceItem
     */
    public function setId(?int $id): InvoiceItem
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return InvoiceItem
     */
    public function setQuantity(int $quantity): InvoiceItem
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getPricePerQuantityUnit(): float
    {
        return $this->pricePerQuantityUnit;
    }

    /**
     * @param float $pricePerQuantityUnit
     * @return InvoiceItem
     */
    public function setPricePerQuantityUnit(float $pricePerQuantityUnit): InvoiceItem
    {
        $this->pricePerQuantityUnit = $pricePerQuantityUnit;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuantityUnit(): ?string
    {
        return $this->quantityUnit;
    }

    /**
     * @param string|null $quantityUnit
     * @return InvoiceItem
     */
    public function setQuantityUnit(?string $quantityUnit): InvoiceItem
    {
        $this->quantityUnit = $quantityUnit;

        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return InvoiceItem
     */
    public function setNote(string $note): InvoiceItem
    {
        $this->note = $note;

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
     * @return InvoiceItem
     */
    public function setInvoice(?Invoice $invoice): InvoiceItem
    {
        $this->invoice = $invoice;

        return $this;
    }
}
