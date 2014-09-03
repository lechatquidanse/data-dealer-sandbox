<?php

namespace Sportlobster\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportlobsterFrontBundle:Home:index.html.twig', array());
    }
}
