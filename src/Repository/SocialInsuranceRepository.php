<?php

namespace App\Repository;

use App\Entity\SocialInsurance;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class SocialInsuranceRepository
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
        $repository = $entityManager->getRepository(SocialInsurance::class);

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
}
