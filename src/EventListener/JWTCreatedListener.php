<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\Security\Core\Security;

class JWTCreatedListener
{
    /**
     * @var Security
     */
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        if (!$event->getData() || !$this->security->getUser()) {
            return;
        }

        $payload = $event->getData();
        $payload['uid'] = $this->security->getUser()->getId();
        $event->setData($payload);
    }
}
