<?php

namespace App\Repository;

use App\Entity\Invoice;
use App\Entity\TimeRecord;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TimeRecordRepository
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
        $repository = $entityManager->getRepository(TimeRecord::class);

        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository(): EntityRepository
    {
        return $this->repository;
    }

    public function assignTimeRecordsToInvoice (Invoice $invoice, array $timeRecordsIds): void
    {
        $qb = $this->entityManager
            ->getRepository(TimeRecord::class)
            ->createQueryBuilder('tr');

        $qb->update(TimeRecord::class, 'tr')
            ->set('tr.invoice', ':invoice')
            ->setParameter('invoice', $invoice->getId())
            ->where($qb->expr()->in('tr.id', $timeRecordsIds))
            ->getQuery()
            ->execute();
    }

    public function unassignTimeRecordsToInvoice (Invoice $invoice): void
    {
        $qb = $this->entityManager
            ->getRepository(TimeRecord::class)
            ->createQueryBuilder('tr');

        $qb->update(TimeRecord::class, 'tr')
            ->set('tr.invoice', ':invoice')
            ->setParameter('invoice', null)
            ->where($qb->expr()->eq('tr.invoice', $invoice->getId()))
            ->getQuery()
            ->execute();
    }
}
