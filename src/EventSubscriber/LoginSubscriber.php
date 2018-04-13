<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginSubscriber implements EventSubscriberInterface
{
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        var_dump('df');
    }

    public static function getSubscribedEvents()
    {
        return [
           'security.interactive_login' => 'onSecurityInteractiveLogin',
        ];
    }
}
