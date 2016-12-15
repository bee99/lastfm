<?php
/**
 * File Lastfm.php
 */

namespace Lib;
use \Config\Config;

/**
 * Class Lastfm
 */
abstract class Lastfm
{
    protected $key;
    protected $secret;
    protected $baseUrl = ''; // http://ws.audioscrobbler.com/2.0/
    protected $method;
    protected $format;

    /**
     * Constructor
     *
     * @param Config $config
     */
    public function __construct(Config $config, array $params = [])
    {
        $this->key = $config->lastFm['key'];
        $this->secret = $config->lastFm['secret'];
        $this->format = 'xml';
        $this->setMethod();
    }//end __construct()

    /**
     * Method: setMethod
     * Abstract method, should be implemented by non abstract classes
     *
     * @return void
     */
    abstract protected function setMethod();

    /**
     * Method: buildUrl
     *
     * @param  Array $params The list of params to build the url
     * @return String
     */
    protected function buildUrl(array $params = [])
    {
        $params['method'] = $this->method;
        $params['api_key'] = $this->key;
        //$params['format'] = $this->format;
        return $this->baseUrl . '?' . http_build_query($params);
    }//end buildUrl()

    /**
     * Method: run
     * Abstract method, should be implemented by non abstract classes
     *
     * @param  Array $params The params to run the method set on setMethod
     * @return void
     */
    abstract public function run($params = null);
}//end class
