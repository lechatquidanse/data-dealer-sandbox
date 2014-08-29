<?php

namespace Sportlobster\Bundle\DataBundle\Model;

use Sportlobster\Bundle\DataBundle\DataLoader;
use Sportlobster\Bundle\DataBundle\Model\DataManagerInterface;
use Sportlobster\Bundle\DataBundle\Model\DataInterface;

abstract class DataManager implements DataManagerInterface
{
    protected $dataLoader;
    protected $collection = array();

    public function __construct()
    {
        $this->dataLoader = new DataLoader();
    }

    abstract public function load(array $params = array());

    public function getDataLoader()
    {
        return $this->dataLoader;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function setCollection(array $collection)
    {
        $this->collection = $collection;

        return $this;
    }

    public function add(DataInterface $element)
    {
        $this->collection[] = $element;
    }

    public function count()
    {
        return count($this->collection);
    }
}
