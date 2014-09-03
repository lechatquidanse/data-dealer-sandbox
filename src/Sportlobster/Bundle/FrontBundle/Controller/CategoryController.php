<?php

namespace Sportlobster\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction($category)
    {
        $newsManager = $this->container->get('sportlobster_data.news_manager');
        $params = array(
            'category' => array($category)
        );
        $collection = $newsManager->load($params);
        
        return $this->render('SportlobsterFrontBundle:Category:index.html.twig', array('collection' => $collection, 'category' => $category, 'exclude_type' => 'report'));
    }
}
