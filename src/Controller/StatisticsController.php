<?php

namespace App\Controller;


use App\Entity\User;
use App\Repository\InvoiceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StatisticsController extends AbstractController
{
    /**
     * @var InvoiceRepository
     */
    private InvoiceRepository $invoiceRepository;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(
        InvoiceRepository $invoiceRepository,
        UserRepository $userRepository
    ) {
        $this->invoiceRepository = $invoiceRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     * @return array
     */
    private function getLastYearStatistics(User $user): array
    {
        return [
            'paidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfLastYearPaidInvoices($user),
            'unpaidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfLastYearUnpaidInvoices($user),
        ];
    }

    /**
     * @param User $user
     * @return array
     */
    private function getThisYearStatistics(User $user): array
    {
        return [
            'paidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfThisYearPaidInvoices($user),
            'unpaidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfThisYearUnpaidInvoices($user),
        ];
    }

    private function getLastMonthStatistics(User $user): array
    {
        return [
            'paidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfLastMonthPaidInvoices($user),
            'unpaidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfLastMonthUnpaidInvoices($user),
        ];
    }

    private function getThisMonthStatistics(User $user): array
    {
        return [
            'paidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfThisMonthPaidInvoices($user),
            'unpaidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfThisMonthUnpaidInvoices($user),
        ];
    }

    private function getMonthStatistics(User $user): array
    {
        $currentStartDate = (new \DateTime('first day of this month 00:00:00'));
        $currentEndDate = (new \DateTime('first day of this month 00:00:00'))->modify('+1 month');

        $statistics = [];

        for ($i = 0; $i < 12; $i++) {
            $statistics[] = [
                'month' => intval($currentStartDate->format('m')),
                'paidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfPaidInvoices(
                    $user,
                    $currentStartDate,
                    $currentEndDate,
                ),
                'unpaidInvoicesPrice' => $this->invoiceRepository->getTotalPriceOfUnpaidInvoices(
                    $user,
                    $currentStartDate,
                    $currentEndDate,
                ),
                'year' => intval($currentStartDate->format('Y')),
            ];

            $currentStartDate = $currentStartDate->modify('-1 month');
            $currentEndDate = $currentEndDate->modify('-1 month');
        }

        return array_reverse($statistics);
    }

    public function getUserStatistics(string $id): Response
    {
        $user = $this->userRepository->getRepository()->find($id);

        if (!$user || !$user instanceof User) {
            throw $this->createNotFoundException(sprintf('User with id %d was not found', $id));
        }

        $statistics = [
          'lastMonth' => $this->getLastMonthStatistics($user),
          'lastYear' => $this->getLastYearStatistics($user),
          'monthStatistics' => $this->getMonthStatistics($user),
          'thisMonth' => $this->getThisMonthStatistics($user),
          'thisYear' => $this->getThisYearStatistics($user),
        ];

        return JsonResponse::create($statistics, JsonResponse::HTTP_OK);
    }
}
