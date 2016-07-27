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
     * @var string Endpoint
     */
    private static $api_endpoint = 'https://<dc>.api.mailchimp.com/3.0';
    
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
    
    /**
     * The guzzle client.
     * @var Guzzle
     */
    private static $client = Null;
    
    
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
            
            SELF::$client = new \GuzzleHttp\Client();
            
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
        list(, $dc) = explode('-', $api_key);
        SELF::$api_endpoint = str_replace('<dc>', $dc, SELF::$api_endpoint);
    }

    
    /**
     * Method to interact with Mailchimp API.
     *
     * 
     *
     * @return Array The data in the form of an array.
     */
    public static function query($data = array(), $query_object = '', $method = 'POST', $query = '')
    {        
        $query_params = [];
        
        //auth
        $query_params['auth'] = ['username', 'password'];

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
        
        $res = SELF::$client->request($method, SELF::$api_endpoint .'/services/data/v33.0/' . $query_object, $query_params);
        
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