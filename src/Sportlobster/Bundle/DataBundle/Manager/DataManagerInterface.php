<?php

namespace Sportlobster\Bundle\DataBundle\Manager;

use Sportlobster\Bundle\DataBundle\Collection\DataCollection;

interface DataManagerInterface
{

    /**
     * [getResources description]
     * @return [type] [description]
     */
    public function getResources();

    /**
     * [setResources description]
     * @param [type] $resources [description]
     */
    public function setResources($resources);

    /**
     * [getDataLoader description]
     * @return [type] [description]
     */
    public function getDataLoader();

    /**
     * [getCollection description]
     * @return [type] [description]
     */
    public function getCollection();

    /**
     * [setCollection description]
     * @param array $collection [description]
     */
    public function setCollection(DataCollection $collection);
    
    /**
     * load description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function load(array $params = array());
}
