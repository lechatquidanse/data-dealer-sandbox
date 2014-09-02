<?php

namespace Sportlobster\Bundle\DataBundle\Client;

/**
 * 
 */
interface ClientInterface
{
    /**
     * Send a GET request
     *
     * @param string|array|Url $url     URL or URI template
     * @param array            $options Array of request options to apply.
     *
     * @return response
     */
    public function get($url = null, $options = []);

    /**
     * Get the response status code (e.g. "200", "404", etc.)
     *
     * @return string
     */
    public function getStatusCode();

    public function getHeader($header, $asArray = false);

    public function getBody();

    public function getContents();
}
