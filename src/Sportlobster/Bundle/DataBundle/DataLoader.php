<?php

namespace Sportlobster\Bundle\DataBundle;

use Sportlobster\Bundle\DataBundle\Client\ClientHttp;

class DataLoader
{
    private $clients;

    public function __construct()
    {
        $this->clients = array(
            'http' => new ClientHttp(),
            //'sftp' => ''
        );
    }
    
    public function get($protocol, $url, array $config = [])
    {
        try {
            switch ($protocol) {
                case 'http':
                    $this->getClient('http')->get($url, $config);
                    $res = $this->getClient('http')->getContents();

                    return $res;
                    break;
                
                default:
                    throw new \Exception(sprintf('Protocol "%s" is not supported.', $protocol));
                    break;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    protected function getClient($protocol)
    {
        if (!isset($this->clients[$protocol])) {
            throw new \Exception(sprintf('The protocol "%s" does not exist.', $protocol));
        }

        return $this->clients[$protocol];
    }
}
