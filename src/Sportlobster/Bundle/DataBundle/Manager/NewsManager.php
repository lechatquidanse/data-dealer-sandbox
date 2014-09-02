<?php

namespace Sportlobster\Bundle\DataBundle\Manager;

use Sportlobster\Bundle\DataBundle\Manager\DataManager ;
use Sportlobster\Bundle\DataBundle\Model\News;

class NewsManager extends DataManager
{
    /**
     * [load description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function load(array $params = array())
    {
        $resources = $this->getRessources();
        $responses = $this->dataLoader->loadDataFromFlux($resources, $params);

        foreach ($responses as $key => $response) {
            
            $items = $response->channel->item;

            foreach ($items as $key => $item) {

                $news = new News();
                $news->setTitle($item->title);
                $news->setDescription($item->description);
                $news->setCategory($item->category);
                $news->setPupDate($item->pubDate);

                $this->collection->add($news);
            }
        }
        
        return $this->collection->getCollection();
    }

    public function getRessources()
    {
        return __DIR__ . '/../Resources/data/flux/newsFlux.xml';
    }
}
