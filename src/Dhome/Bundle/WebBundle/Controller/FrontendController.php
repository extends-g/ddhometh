<?php

namespace Dhome\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function indexAction()
    {
        return $this->render('DhomeWebBundle::web/index.html.twig');
    }

    public function submenuAction()
    {
        return $this->render('DhomeWebBundle::web/_sub-menu.mobile.html.twig');
    }

    public function projectAction()
    {
        return $this->render('DhomeWebBundle::web/project.html.twig');
    }

    public function projectShowAction()
    {
        return $this->render('DhomeWebBundle::web/_project-show.html.twig');
    }

    public function pressAction()
    {
        return $this->render('DhomeWebBundle::web/press.html.twig');
    }

    public function collectionAction()
    {
        return $this->render('DhomeWebBundle::web/collection.html.twig');
    }

    public function contactAction()
    {
        return $this->render('DhomeWebBundle::web/contact.html.twig');
    }
}
