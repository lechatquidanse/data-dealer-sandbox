<?php

namespace Sportlobster\Bundle\DataBundle\Manager;

use Sportlobster\Bundle\DataBundle\Collection\DataCollection;
use Sportlobster\Bundle\DataBundle\Loader\DataLoader;
use Sportlobster\Bundle\DataBundle\Manager\DataManagerInterface;
use Sportlobster\Bundle\DataBundle\Model\DataInterface;

abstract class DataManager implements DataManagerInterface
{
    protected $dataLoader;
    protected $resources;
    protected $collection;

    public function __construct(DataLoader $dataloader)
    {
        $this->dataLoader = $dataloader;
        $this->collection = new DataCollection();
    }

    abstract public function load(array $params = array());

    public function getDataLoader()
    {
        return $this->dataLoader;
    }
    
    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * [setCollection description]
     * @param array $collection [description]
     */
    public function setCollection(DataCollection $collection)
    {
        $this->collection = $collection;

        return $this;
    }
}
