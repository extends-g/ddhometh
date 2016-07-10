<?php

namespace Dhome\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackendController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('DhomeWebBundle::admin/dashboard.html.twig');
    }
}
