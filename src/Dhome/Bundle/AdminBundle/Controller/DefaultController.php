<?php

namespace Dhome\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DhomeAdminBundle:Default:index.html.twig');
    }
}
