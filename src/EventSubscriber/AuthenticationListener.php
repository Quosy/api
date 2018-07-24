<?php


namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;

class AuthenticationListener implements EventSubscriberInterface
{


    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container
    {
        $this->container = $container;
    }

    /**
     * getSubscribedEvents
     *
     * @author 	Houziaux mike <jenaye@protonmail.com>
     * @return 	array
     */
    public static function getSubscribedEvents()
    {
        return array(
            'kernel.request' => 'onKernelRequest',
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuthenticationSuccess',
        );
    }


    public function onAuthenticationFailure()
    {
      // nothing
    }

    // update field lastLogin
    public function onAuthenticationSuccess()
    {

        /*
       $em = $this->container->get('doctrine.orm.entity_manager');
       $users = $em->getRepository(User::class)->find($id);
       var_dump('User =>',$users);
        */


    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        // trying to get ID of user, than use it to update field lastLogin
        $request  = $event->getRequest();
        var_dump("Parameters => ",$request->request->all());
    }
}
