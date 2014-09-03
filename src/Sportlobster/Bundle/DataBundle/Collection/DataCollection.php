<?php

namespace Sportlobster\Bundle\DataBundle\Collection;

use Sportlobster\Bundle\DataBundle\Model\DataInterface;

class DataCollection
{
    /**
     * $collection 
     * @var array
     */
    protected $collection = array();

    /**
     * Add a Data elment to the current collection
     * @param DataInterface $element
     */
    public function add(DataInterface $element)
    {
        $this->collection[] = $element;
    }

    /**
     * get an element from collection according to its key
     * @param  string $key 
     * @return DataInterface|null      the element
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->collection)) {

            return $this->collection[$key];
        }
    }

    /**
     * count the number of element present in the collection
     * @return int number of element
     */
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
