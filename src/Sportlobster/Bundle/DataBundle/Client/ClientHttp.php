<?php

namespace Sportlobster\Bundle\DataBundle\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;
use Sportlobster\Bundle\DataBundle\Client\ClientInterface;

class ClientHttp extends Client implements ClientInterface
{
    protected $response;

    public function getStatusCode()
    {
        if ($this->response instanceof ResponseInterface) {

            return $this->response->getStatusCode();
        }
    }
    public function getHeader($header, $asArray = false)
    {
        if ($this->response instanceof ResponseInterface) {

            return $this->response->getHeader($header, $asArray = false);
        }
    }
    public function getBody()
    {
        if ($this->response instanceof ResponseInterface) {

            return $this->response->getStatusCode();
        }
    }

    public function get($url = null, $options = [])
    {
        $this->response = parent::get($url, $options);

        return $this->response;
    }

    public function getContents()
    {
        $contentType = $this->getHeader('content-type');

        switch ($contentType) {

            case 'application/rss+xml':
            case 'application/xml':
            
                return $this->response->xml();
                break;

            case 'application/json':
            
                return $this->response->json();
                break;
            
            default:
                return array();
                break;
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
