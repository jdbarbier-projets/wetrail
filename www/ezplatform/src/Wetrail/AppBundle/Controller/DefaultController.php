<?php

namespace Wetrail\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WetrailAppBundle:Default:index.html.twig');
    }
}
