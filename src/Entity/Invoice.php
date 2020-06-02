<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Invoice implements OwnedByUserInterface
{
    /**
     * @var integer|null Id
     */
    private ?int $id;

    /**
     * @var string Invoice identifier
     */
    private string $invoiceIdentifier;

    /**
     * @var DateTimeImmutable Invoice date
     */
    private DateTimeImmutable $invoiceDate;

    /**
     * @var DateTimeImmutable Invoice due date
     */
    private DateTimeImmutable $invoiceDueDate;

    /**
     * @var DateTimeImmutable|null Invoice payment date
     */
    private ?DateTimeImmutable $invoicePaymentDate = null;

    /**
     * @var Collection Invoice items
     */
    private Collection $invoiceItems;

    /**
     * @var InvoiceClientInfo|null Client info
     */
    private ?InvoiceClientInfo $clientInfo = null;

    /**
     * @var InvoiceProjectInfo|null Project info
     */
    private ?InvoiceProjectInfo $projectInfo = null;

    /**
     * @var User|null Entity owner
     */
    private ?User $owner = null;

    // project + client

    public function __construct()
    {
        $this->invoiceIdentifier = '';
        $this->invoiceDate = new DateTimeImmutable();
        $this->invoiceDueDate = new DateTimeImmutable();
        $this->invoiceItems = new ArrayCollection();
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
     * @return Invoice
     */
    public function setId(?int $id): Invoice
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceIdentifier(): string
    {
        return $this->invoiceIdentifier;
    }

    /**
     * @param string $invoiceIdentifier
     * @return Invoice
     */
    public function setInvoiceIdentifier(string $invoiceIdentifier): Invoice
    {
        $this->invoiceIdentifier = $invoiceIdentifier;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getInvoiceDate(): DateTimeImmutable
    {
        return $this->invoiceDate;
    }

    /**
     * @param DateTimeImmutable $invoiceDate
     * @return Invoice
     */
    public function setInvoiceDate(DateTimeImmutable $invoiceDate): Invoice
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getInvoiceDueDate(): DateTimeImmutable
    {
        return $this->invoiceDueDate;
    }

    /**
     * @param DateTimeImmutable $invoiceDueDate
     * @return Invoice
     */
    public function setInvoiceDueDate(DateTimeImmutable $invoiceDueDate): Invoice
    {
        $this->invoiceDueDate = $invoiceDueDate;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getInvoicePaymentDate(): ?DateTimeImmutable
    {
        return $this->invoicePaymentDate;
    }

    /**
     * @param DateTimeImmutable|null $invoicePaymentDate
     * @return Invoice
     */
    public function setInvoicePaymentDate(?DateTimeImmutable $invoicePaymentDate): Invoice
    {
        $this->invoicePaymentDate = $invoicePaymentDate;

        return $this;
    }

    /**
     * @return InvoiceItem[]
     */
    public function getInvoiceItems(): array
    {
        return $this->invoiceItems->toArray();
    }

    /**
     * @param InvoiceItem[] $invoiceItems
     * @return Invoice
     */
    public function setInvoiceItems(array $invoiceItems): Invoice
    {
        foreach ($invoiceItems as $invoiceItem) {
            $invoiceItem->setInvoice($this);
        }

        $this->invoiceItems = new ArrayCollection($invoiceItems);

        return $this;
    }

    /**
     * @return InvoiceClientInfo|null
     */
    public function getClientInfo(): ?InvoiceClientInfo
    {
        return $this->clientInfo;
    }

    /**
     * @param InvoiceClientInfo|null $clientInfo
     * @return Invoice
     */
    public function setClientInfo(?InvoiceClientInfo $clientInfo): Invoice
    {
        $this->clientInfo = $clientInfo;

        return $this;
    }

    /**
     * @return InvoiceProjectInfo|null
     */
    public function getProjectInfo(): ?InvoiceProjectInfo
    {
        return $this->projectInfo;
    }

    /**
     * @param InvoiceProjectInfo|null $projectInfo
     * @return Invoice
     */
    public function setProjectInfo(?InvoiceProjectInfo $projectInfo): Invoice
    {
        $this->projectInfo = $projectInfo;

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
     * @return Invoice
     */
    public function setOwner(?User $owner): Invoice
    {
        $this->owner = $owner;

        return $this;
    }
}