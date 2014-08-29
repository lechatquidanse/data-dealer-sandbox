<?php

namespace Sportlobster\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SportlobsterFrontBundle:Default:index.html.twig', array('name' => $name));
    }
}
