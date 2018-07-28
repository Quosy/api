<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class AuthenticationListener extends Controller
{
    private $em;
    private $logger;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger, RequestStack $requestStack)
    {
        $this->em = $entityManager;
        $this->logger = $logger;
        $this->requestStack = $requestStack;
    }

    /**
     * Update lastLogin field when jwt token is created.
     *
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $ip = $this->requestStack->getCurrentRequest()->getClientIp();

        $loggedUser = $event->getUser();
        $loggedUser->setLastLogin(new \DateTime());

        $this->em->persist($loggedUser);
        $this->em->flush();
        $this->logger->info("user " .$loggedUser->getUsername() . " logged in using " . $ip);
    }
}
