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
            
            $items = isset($response->channel->item) ? $response->channel->item : array();

            foreach ($items as $key => $item) {

                $title = isset($item->title) ? $item->title : null;
                $description = isset($item->description) ? $item->description : null;
                $category = isset($item->category) ? $item->category : null;
                $pubDate = isset($item->pubDate) ? $item->pubDate : null;

                $news = new News();
                $news->setTitle($title);
                $news->setDescription($description);
                $news->setCategory($category);
                $news->setPupDate($pubDate);

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
