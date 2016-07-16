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

    public function contactAction()
    {
        return $this->render('DhomeWebBundle::web/contact.html.twig');
    }
}
