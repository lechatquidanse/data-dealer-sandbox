<?php

namespace Sportlobster\Bundle\DataBundle\Model;

use Sportlobster\Bundle\DataBundle\Model\DataManager ;
use Sportlobster\Bundle\DataBundle\Model\News;

class NewsManager extends DataManager
{
    protected $fluxParams = array();

    public function __construct()
    {
        $this->fluxParams = $this->loadFluxParams();
        parent::__construct();
    }

    public function load(array $params = array())
    {
        $response = $this->dataLoader->get('http', 'http://www.skysports.com/rss/0,20514,11661,00.xml');
        $items = $response->channel->item;

        foreach ($items as $key => $item) {
            $news = new News();
            $news->setTitle($item->title->__toString());
            $news->setDescription($item->description);

            $this->add($news);

        }

        var_dump($this->collection);
    }

    private function loadFluxParams()
    {
        return true;//simplexml_load_file('./../Resources/data/flux/newsFlux.xml');
    }
}
