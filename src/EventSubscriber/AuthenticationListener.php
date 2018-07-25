<?php


namespace App\EventSubscriber;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationListener extends Controller
{
    /**
     * @param JWTCreatedEvent $event
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $user = $event->getUser();
        $id = $user->getId();
        $user->getUsername();
        var_dump($id);
        exit;
        $em = $this->container->get('doctrine.orm.entity_manager');
        $demand = $em->getRepository(User::class)->find($id);
        $now = (new DateTime('now'))->format('Y-m-d H:i:s');
        $demand->setL($now);
        $em->persist($demand);
        $em->flush();

    }

}
