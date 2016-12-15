<?php
/**
 * File Config.php
 */

namespace Config;

/**
 * Class Config
 */
class Config
{
    /**
     * @var $instance Config It represents the only one instance of the class.
     */
    private static $instance = null;

    /**
     *
     */
    private function __construct()
    {
        require_once 'Psr4AutoloaderClass.php';
        $this->loader = new Psr4AutoloaderClass();
        $this->loader->register();
        $this->loader->addNamespace('Includes', __DIR__ . '/../includes');
        $this->loader->addNamespace('Lib', __DIR__ . '/../lib');
        $this->loader->addNamespace('App', __DIR__ . '/../app');
        $this->parseIni();
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    /**
     *
     */
    private function parseIni()
    {
        foreach (parse_ini_file('config.ini') as $key => $value) {
            $this->$key = $value;
        }
    }
}
