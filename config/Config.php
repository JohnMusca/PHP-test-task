<?php

namespace Manager\libs\DataService;

class Config implements SingletonInterface
{   
    /**
    * @var string Username.
    */
    private static $username = 'DaCount1';
    
    /**
     * @var string Password.
     */
    private static $password = '';
    
    /**
     * @var string DB_url.
     */
    private static $api_key = '2b976df89c7e404eea60b26153152bdc-us13';
    
    /**
     * @var Object The current running instance of the object.
     */
    private static $instance;
    
    private function __construct()
    {
        
    }
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) 
        {
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    /**
     * Get client.
     * 
     * @return Object
     */
    public function getClient()
    {
        return SELF::$client;
    }
    
    /**
     * Private clone method to prevent cloning of the instance of the *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    
    }
    
    /**
     * Private unserialize method to prevent unserializing of the *Singleton* instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    
    }
}