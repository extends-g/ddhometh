<?php

namespace Dhome\Bundle\AdminBundle\Controller;

use Sylius\Bundle\UserBundle\Controller\UserController as BaseUserController;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfiguration;
use Sylius\Component\User\Model\UserInterface;
use Sylius\Bundle\UserBundle\UserEvents;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends BaseUserController
{
    /**
     * {@inheritdoc}
     */
    protected function handleChangePassword(RequestConfiguration $configuration, UserInterface $user, $newPassword)
    {
        $user->setPlainPassword($newPassword);

        $dispatcher = $this->container->get('event_dispatcher');
        $dispatcher->dispatch(UserEvents::PRE_PASSWORD_CHANGE, new GenericEvent($user));

        $this->manager->flush();
        $this->addFlash('success', 'sylius.user.password.change.success');

        $dispatcher->dispatch(UserEvents::POST_PASSWORD_CHANGE, new GenericEvent($user));

        if (!$configuration->isHtmlRequest()) {
            return $this->viewHandler->handle($configuration, View::create($user, 204));
        }

        return new RedirectResponse($this->container->get('router')->generate('dhome_admin_dashboard'));
    }
}
