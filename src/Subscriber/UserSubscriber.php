<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Entity\UserNotifications;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class UserSubscriber implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;


    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }


    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['addUser', EventPriorities::POST_WRITE],
            ],
        ];
    }

    /**
     * @param ViewEvent $event
     */
    public function addUser(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof User) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_POST !== $method) {
            return;
        }

        $userNotifications = new UserNotifications();
        $userNotifications->setUser($entity);

        $this->entityManager->persist($userNotifications);
        $this->entityManager->flush();
    }
}
