<?php

namespace Sportlobster\Bundle\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name = 'stef')
    {
        $newsManager = $this->container->get('sportlobster_data.news_manager');
        $newsManager->load();

        return $this->render('SportlobsterDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
