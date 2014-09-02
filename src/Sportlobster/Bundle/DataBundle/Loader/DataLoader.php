<?php

namespace Sportlobster\Bundle\DataBundle\Loader;

use Sportlobster\Bundle\DataBundle\Client\ClientInterface;
use Sportlobster\Bundle\DataBundle\Client\ClientHttp;
use Psr\Log\LoggerInterface;

/**
 * 
 */
class DataLoader
{
    /**
     * $clients array of client listed by protocol
     * @var array
     */
    private $clients;

    /**
     * $logger logger service
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * __construct
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->clients = array(
            'http' => new ClientHttp(),
            //'ftp' => ''
        );
    }
    
    /**
     * get make a GET request according to a protocol, an url, and configs
     * 
     * @param  string $protocol the protocol needed to make an approprieted request
     * @param  string $url      the url where the request is made
     * @param  array $config    config needed for the request
     * @return response         
     */
    public function get($protocol, $url, array $config = [])
    {
        $res = array();

        try {
            switch ($protocol) {
                case 'http':
                    $client = $this->getClient('http');
                    $client->get($url, $config);

                    if ('200' != $client->getStatusCode()) {
                        throw new \Exception(sprintf('Status code error "%s"', $client->getStatusCode()));
                    }
                    $res = $client->getContents();
                    break;
                
                default:
                    throw new \Exception(sprintf('Protocol "%s" is not supported.', $protocol));
                    break;
            }
        } catch (\Exception $e) {

            $this->logger->error($e->getMessage());
        }

        return $res;
    }

    /**
     * getClient return the requested cliend according to the protocol needed
     * 
     * @param  string $protocol the protocol needed to make an approprieted request
     * @return ClientInterface  the client that will handle request
     */
    protected function getClient($protocol)
    {
        if (!isset($this->clients[$protocol])) {
            throw new \Exception(sprintf('The protocol "%s" does not exist.', $protocol));
        }

        return $this->clients[$protocol];
    }

    /**
     * selectDataFlux select wich of the flux listed in $dataFluxParams match condition in $params
     * 
     * @param  array  $dataFluxParams array of flux params
     * @param  array  $params         conditions of flux needed
     * @return array                  list of fulx wanted
     */
    protected function selectDataFlux($dataFluxParams, array $params = array())
    {
        $fluxSelected = array();
        $category = isset($params['category']) ? $params['category'] : null;
        $fluxTitle = isset($params['flux']) ? $params['flux'] : null;

        foreach ($dataFluxParams as $key => $flux) {
            
            if (!$category && !$fluxTitle) {
                
                $fluxSelected[] = $flux;
            } elseif (is_array($fluxTitle) && in_array($flux->title, $fluxTitle)) {

                $fluxSelected[] = $flux;
            } elseif (is_array($category) && in_array($flux->category, $category)) {

                $fluxSelected[] = $flux;
            }
        }

        return $fluxSelected;
    }

    /**
     * loadDataFluxParams Load params of flux from config file xml
     * If an excpetion is catched, it logged, and an emty array is returned
     * 
     * @param  string $resource path of the config file where is stored information of flux, in an xmpl file
     * @return array            array of flux parameters
     */
    protected function loadDataFluxParams($resource)
    {
        try {
            $previous = libxml_use_internal_errors(true);

            if (false === $xml = simplexml_load_file($resource)) {

                libxml_use_internal_errors($previous);
                $error = libxml_get_last_error();

                throw new \Exception(sprintf('An error occurred while reading "%s": %s', $resource, $error->message));
            }
            libxml_use_internal_errors($previous);

            return $xml->flux->item;
        } catch (\Exception $e) {
            
            $this->logger->error('DataLoader: ' . $e->getMessage());
        }
        
        return array();
    }

    /**
     * loadDataFromFlux load Data from a resources config file that informs about how you can load data
     * 
     * @param  string $resources path of the file that informs about what flux are available
     * @param  array  $params    params to conditionned wich flux has to be loaded
     * @return array  $responses array of data responses
     */
    public function loadDataFromFlux($resources, array $params = array())
    {
        $dataFluxParams = $this->loadDataFluxParams($resources);
        $dataFluxSelected = $this->selectDataFlux($dataFluxParams, $params);
        
        $responses = array();

        foreach ($dataFluxSelected as $key => $flux) {
            
            $responses[] = $this->get($flux->params->protocol, $flux->params->url);
        }

        return $responses;
    }
}
