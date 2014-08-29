<?php

namespace Sportlobster\Bundle\DataBundle\Client;

/**
 * 
 */
interface ClientInterface
{
    public function get($url = null, $options = []);
    public function getStatusCode();
    public function getHeader($header, $asArray = false);
    public function getBody();
    public function getContents();
}
