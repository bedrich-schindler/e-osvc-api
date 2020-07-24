<?php

namespace App\Repository;

use App\Entity\Invoice;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class InvoiceRepository
{
    /**
     * @var EntityRepository
     */
    private EntityRepository $repository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        /** @var EntityRepository $repository */
        $repository = $entityManager->getRepository(Invoice::class);

        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Invoice[] $invoices
     * @return float
     */
    private function calculateTotalPrice(array $invoices): float
    {
        $totalPrice = 0;

        foreach ($invoices as $invoice) {
            foreach ($invoice->getInvoiceItems() as $invoiceItem) {
                $totalPrice += $invoiceItem->getPricePerQuantityUnit() * $invoiceItem->getQuantity();
            }
        }

        return $totalPrice;
    }

    /**
     * @param User $user
     * @param \DateTime $startDateTime
     * @param \DateTime $endDateTime
     * @return float
     */
    public function getTotalPriceOfPaidInvoices(User $user, \DateTime $startDateTime, \DateTime $endDateTime): float
    {
        /** @var QueryBuilder $qb */
        $qb = $this->entityManager
            ->getRepository(Invoice::class)
            ->createQueryBuilder('i');

        $invoices = $qb->select('i')
            ->where($qb->expr()->gte('i.invoiceDate', ':startDateTime'))
            ->andWhere($qb->expr()->lt('i.invoiceDate', ':endDateTime'))
            ->andWhere($qb->expr()->isNotNull('i.invoicePaymentDate'))
            ->andWhere($qb->expr()->eq('i.owner', ':user'))
            ->setParameter('startDateTime', $startDateTime)
            ->setParameter('endDateTime', $endDateTime)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        return $this->calculateTotalPrice($invoices);
    }

    /**
     * @param User $user
     * @param \DateTime $startDateTime
     * @param \DateTime $endDateTime
     * @return float
     */
    public function getTotalPriceOfUnpaidInvoices(User $user, \DateTime $startDateTime, \DateTime $endDateTime): float
    {
        /** @var QueryBuilder $qb */
        $qb = $this->entityManager
            ->getRepository(Invoice::class)
            ->createQueryBuilder('i');

        $invoices = $qb->select('i')
            ->where($qb->expr()->gte('i.invoiceDate', ':startDateTime'))
            ->andWhere($qb->expr()->lt('i.invoiceDate', ':endDateTime'))
            ->andWhere($qb->expr()->isNull('i.invoicePaymentDate'))
            ->andWhere($qb->expr()->eq('i.owner', ':user'))
            ->setParameter('startDateTime', $startDateTime)
            ->setParameter('endDateTime', $endDateTime)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        return $this->calculateTotalPrice($invoices);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfLastYearPaidInvoices(User $user): float
    {
        $previousYear = (new \DateTime('first day of january'))->modify('-1 year');
        $thisYear = new \DateTime('first day of january');

        return $this->getTotalPriceOfPaidInvoices($user, $previousYear, $thisYear);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfLastYearUnpaidInvoices(User $user): float
    {
        $previousYear = (new \DateTime('first day of january'))->modify('-1 year');
        $thisYear = new \DateTime('first day of january');

        return $this->getTotalPriceOfUnpaidInvoices($user, $previousYear, $thisYear);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfThisYearPaidInvoices(User $user): float
    {
        $thisYear = new \DateTime('first day of january');
        $nextYear = (new \DateTime('first day of january'))->modify('+1 year');

        return $this->getTotalPriceOfPaidInvoices($user, $thisYear, $nextYear);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfThisYearUnpaidInvoices(User $user): float
    {
        $thisYear = new \DateTime('first day of january');
        $nextYear = (new \DateTime('first day of january'))->modify('+1 year');

        return $this->getTotalPriceOfUnpaidInvoices($user, $thisYear, $nextYear);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfLastMonthPaidInvoices(User $user): float
    {
        $previousMonth = (new \DateTime('first day of this month 00:00:00'))->modify('-1 month');
        $thisMonth = new \DateTime('first day of this month 00:00:00');

        return $this->getTotalPriceOfPaidInvoices($user, $previousMonth, $thisMonth);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfLastMonthUnpaidInvoices(User $user): float
    {
        $previousMonth = (new \DateTime('first day of this month 00:00:00'))->modify('-1 month');
        $thisMonth = new \DateTime('first day of this month 00:00:00');

        return $this->getTotalPriceOfUnpaidInvoices($user, $previousMonth, $thisMonth);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfThisMonthPaidInvoices(User $user): float
    {
        $thisMonth = new \DateTime('first day of this month 00:00:00');
        $nextMonth = (new \DateTime('first day of this month 00:00:00'))->modify('+1 month');

        return $this->getTotalPriceOfPaidInvoices($user, $thisMonth, $nextMonth);
    }

    /**
     * @param User $user
     * @return float
     */
    public function getTotalPriceOfThisMonthUnpaidInvoices(User $user): float
    {
        $thisMonth = new \DateTime('first day of this month 00:00:00');
        $nextMonth = (new \DateTime('first day of this month 00:00:00'))->modify('+1 month');

        return $this->getTotalPriceOfUnpaidInvoices($user, $thisMonth, $nextMonth);
    }

    /**
     * @return EntityRepository
     */
    public function getRepository(): EntityRepository
    {
        return $this->repository;
    }
}
