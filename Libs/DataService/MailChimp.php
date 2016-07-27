<?php

use Manager\Libs\Interfaces\SingletonInterface;

class MailChimp implements SingletonInterface
{
    /**
     * @var String The URL to connect to.
     */
    private static $url = '';
    
    /**
     * @var string the token URL
     */
    private static $token_query = '/services/oauth2/token';
    
    /**
     * @var string Username.
     */
    private static $username = '';
    
    /**
     * @var string Api key.
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
            SELF::setDbCredentials();
            
            SELF::$client       = new GuzzleHttp\Client();
            SELF::$token        = SELF::getToken()->access_token;
            SELF::$instance_url = SELF::getToken()->instance_url;
            
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    /**
     * SetDbCredentials.
     *
     * @return void
     */
    private function setDbCredentials()
    {
        SELF::$username      = getenv('SALESFORCE_USERNAME');
        SELF::$password      = getenv('SALESFORCE_PASSWORD');
        SELF::$url           = getenv('SALESFORCE_URL');
        SELF::$client_id     = getenv('SALESFORCE_CLIENTID');
        SELF::$client_secret = getenv('SALESFORCE_CLIENT_SECRET');
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
     * getToken. Gets the token from appspace.
     *
     * @return String Returns the token.
     */
    
    public function getToken()
    {        
        $res = SELF::$client->post(SELF::$url . SELF::$token_query, [
                'headers' => array(
                        'Accept'       => 'application/json',
                        'Content-Type' => 'application/x-www-form-urlencoded',
                ),
                
                'form_params' => array(
                          'grant_type' => 'password',
                          'client_id'     => SELF::$client_id,
                          'client_secret' => SELF::$client_secret,
                          'username'      => SELF::$username,
                          'password'      => SELF::$password 
                         )
        ]);
        
        if($res->getStatusCode() !== 200)
        {
            return false;
        }
    
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