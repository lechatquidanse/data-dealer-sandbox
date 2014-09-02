<?php

namespace Sportlobster\Bundle\DataBundle\Collection;

use Sportlobster\Bundle\DataBundle\Model\DataInterface;

class DataCollection
{
    protected $collection = array();

    public function add(DataInterface $element)
    {
        $this->collection[] = $element;
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->collection)) {

            return $this->collection[$key];
        }
    }

    public function count()
    {
        return count($this->collection);
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
}
