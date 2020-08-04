<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class AccessSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [
                ['accessControlOfUserResources', EventPriorities::PRE_READ],
                ['accessControlOfUserSubResources', EventPriorities::PRE_READ],
            ],
        ];
    }

    public function accessControlOfUserResources(RequestEvent $event)
    {
        $request = $event->getRequest();

        $resourceRoutesToCheck = [
            'api_invoices_get_collection',
            'api_time_records_get_collection',
        ];

        if (!in_array($request->attributes->get('_route'), $resourceRoutesToCheck)) {
            return;
        }

        if (!$request->query->has('owner_id')) {
            throw new AccessDeniedHttpException();
        }

        $token = $this->tokenStorage->getToken();
        $resourceUserId = $request->query->getInt('owner_id');

        if (
            !$token
            || !($token->getUser() instanceof User)
            || $token->getUser()->getId() !== $resourceUserId
        ) {
            throw new AccessDeniedHttpException();
        }
    }

    public function accessControlOfUserSubResources(RequestEvent $event)
    {
        $request = $event->getRequest();

        $subResourceRoutesToCheck = [
            'api_users_clients_get_subresource',
            'api_users_health_insurances_get_subresource',
            'api_users_invoices_get_subresource',
            'api_users_projects_get_subresource',
            'api_users_sickness_insurances_get_subresource',
            'api_users_social_insurances_get_subresource',
            'api_users_taxes_get_subresource',
            'api_users_time_records_get_subresource',
        ];
        $subResourceUserId = intval($request->attributes->get('id'));

        if (!in_array($request->attributes->get('_route'), $subResourceRoutesToCheck)) {
            return;
        }

        $token = $this->tokenStorage->getToken();

        if (
            !$token
            || !($token->getUser() instanceof User)
            || $token->getUser()->getId() !== $subResourceUserId
        ) {
            throw new AccessDeniedHttpException();
        }
    }
}
