<?php

namespace Sportlobster\Bundle\DataBundle\Tests\Controller;

use Sportlobster\Bundle\DataBundle\Collection\DataCollection;
use Sportlobster\Bundle\DataBundle\Model\NewsManager;
use Sportlobster\Bundle\DataBundle\Model\News;

class DataCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $news1 = new News();
        $news1->setTitle('title news 1');
        $news1->setDescription('description news 1');
        $news2 = new News();
        $news2->setTitle('title news 2');
        $news2->setDescription('description news 2');
        $news3 = new News();
        $news3->setTitle('title news 3');
        $news3->setDescription('description news 3');

        $newsCollection = new DataCollection();
        $newsCollection->add($news1);
        $newsCollection->add($news2);
        $newsCollection->add($news3);

        $newsInCollection = $newsCollection->get(1);

        $this->assertEquals($news2->getTitle(), $newsInCollection->getTitle());
    }

    public function testCount()
    {
        $news = new News();
        $news->setTitle('title news 1');
        $news->setDescription('description news 1');

        $newsCollection = new DataCollection();

        $this->assertEquals(0, $newsCollection->count());

        $collection = $newsCollection->add($news);

        $this->assertEquals(1, $newsCollection->count());
    }

    public function testAdd()
    {
        $news = new News();
        $news->setTitle('title news 1');
        $news->setDescription('description news 1');

        $newsCollection = new DataCollection();
        $newsCollection->add($news);

        $newsInCollection = $newsCollection->get(0);

        $this->assertEquals($news->getTitle(), $newsInCollection->getTitle());
        $this->assertEquals(1, $newsCollection->count());
    }
}
