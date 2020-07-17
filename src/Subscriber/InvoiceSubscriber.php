<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Invoice;
use App\Repository\TimeRecordRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class InvoiceSubscriber implements EventSubscriberInterface
{
    /**
     * @var TimeRecordRepository
     */
    private TimeRecordRepository $timeRecordRepository;


    public function __construct(TimeRecordRepository $timeRecordRepository) {
        $this->timeRecordRepository = $timeRecordRepository;
    }


    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['addInvoice', EventPriorities::POST_WRITE],
                ['editInvoice', EventPriorities::POST_WRITE],
                ['deleteInvoice', EventPriorities::POST_WRITE],
            ],
        ];
    }

    /**
     * @param ViewEvent $event
     */
    public function addInvoice(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof Invoice) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_POST !== $method) {
            return;
        }

        $stringContent = $event->getRequest()->getContent();
        $content = json_decode($stringContent, true);

        if (
            $content === null
            || !isset($content['timeRecordsIds'])
            || count($content['timeRecordsIds']) === 0
        ) {
            return;
        }

        $this->timeRecordRepository->assignTimeRecordsToInvoice($entity, $content['timeRecordsIds']);
    }

    /**
     * @param ViewEvent $event
     */
    public function editInvoice(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof Invoice) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_PUT !== $method) {
            return;
        }

        $stringContent = $event->getRequest()->getContent();
        $content = json_decode($stringContent, true);

        $this->timeRecordRepository->unassignTimeRecordsToInvoice($entity);

        if (
            $content === null
            || !isset($content['timeRecordsIds'])
            || count($content['timeRecordsIds']) === 0
        ) {
            return;
        }

        $this->timeRecordRepository->assignTimeRecordsToInvoice($entity, $content['timeRecordsIds']);
    }

    /**
     * @param ViewEvent $event
     */
    public function deleteInvoice(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof Invoice) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_DELETE !== $method) {
            return;
        }

        $this->timeRecordRepository->unassignTimeRecordsToInvoice($entity);
    }
}
