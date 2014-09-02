<?php

namespace Sportlobster\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportlobsterFrontBundle:Home:index.html.twig', array());
    }

    public function categoryAction($category)
    {
        $newsManager = $this->container->get('sportlobster_data.news_manager');
        $params = array(
            'category' => array($category)
        );
        $collection = $newsManager->load($params);

        return $this->render('SportlobsterFrontBundle:Category:index.html.twig', array('collection' => $collection));
    }
}
