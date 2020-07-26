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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserSubscriber implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['addUserPre', EventPriorities::PRE_VALIDATE],
                ['addUserPost', EventPriorities::POST_WRITE],
                ['editUserPre', EventPriorities::PRE_VALIDATE],
            ],
        ];
    }

    /**
     * @param ViewEvent $event
     */
    public function addUserPre(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof User) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_POST !== $method) {
            return;
        }

        $this->encodePassword($entity);
    }

    /**
     * @param ViewEvent $event
     */
    public function addUserPost(ViewEvent $event): void
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

    /**
     * @param ViewEvent $event
     */
    public function editUserPre(ViewEvent $event): void
    {
        $entity = $event->getControllerResult();

        if (!$entity instanceof User) {
            return;
        }

        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_PUT !== $method) {
            return;
        }

        $this->encodePassword($entity);
    }


    private function encodePassword(User $entity): void
    {
        if (null === $entity->getPlainPassword()) {
            return;
        }

        $encoded = $this->passwordEncoder->encodePassword(
            $entity,
            $entity->getPlainPassword()
        );
        $entity->setPassword($encoded);
    }
}
