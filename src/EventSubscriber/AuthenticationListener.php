<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthenticationListener extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Update lastLogin field when jwt token is created.
     *
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $loggedUser = $event->getUser();
        $loggedUser->setLastLogin(new \DateTime());

        $this->em->persist($loggedUser);
        $this->em->flush();
    }
}
