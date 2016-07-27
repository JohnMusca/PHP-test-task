<?php

namespace Manager\libs\DataService;

use Manager\Libs\Interfaces\SingletonInterface;

class MailChimp implements SingletonInterface
{
    /**
     * @var String The URL to connect to.
     */
    private static $url = '';
    
    /**
     * @var string Username.
     */
    private static $api_key = '';
    
    /**
     * @var Object The current running instance of the object.
     */
    private static $instance;
    
    /**
     * @var string Token to use.
     */
    private static $token = '';
    
    /**
     * The config object instance
     * @var \Config
     */
    private static $config = Null;
    
    
    private function __construct()
    {
        
    }
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance(\Manager\Config\Config $config = Null)
    {
        if (null === static::$instance) 
        {
            SELF::$config = $config;
            
            SELF::setCredentials(SELF::$config->__get('api_key'));
             
            SELF::$client = new GuzzleHttp\Client();
            
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    /**
     * SetDbCredentials.
     *
     * @return void
     */
    private function setCredentials($api_key = '')
    {
        SELF::$api_key = $api_key;
    }

    
    /**
     * query.
     *
     * @param String $query        The array with the data.
     * @param String $query_object The object to query on.
     * @param String $method       The method to use (post/get).
     * @param String $query        The query to use.
     *
     * @return Array The data in the form of an array.
     */
    public static function query($data = array(), $query_object = '', $method = 'POST', $query = '')
    {        
        $query_params = array(
                'headers' => array(
                        'Authorization' => 'Bearer ' . SELF::$token
                )
        );
        
        if(!empty($data))
        {
            $query_params['json'] = $data;
        }
        
        if(!empty($query))
        {
            $query_params['query'] = array(
                                         'q' => $query
                                     );
        }
        
        $res = SELF::$client->request($method, SELF::$instance_url .'/services/data/v33.0/' . $query_object, $query_params);
        
        $request_object = json_decode($res->getBody()->getContents());
        
        return $request_object;
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