<?php

namespace Sportlobster\Bundle\DataBundle\Model;

interface DataManagerInterface
{
    public function load(array $params = array());
}
