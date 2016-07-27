<?php

namespace Manager\libs\DataService;

class Database implements SingletonInterface
{   
    /**
    * @var string Username.
    */
    private static $username = '';
    
    /**
     * @var string Password.
     */
    private static $password = '';
    
    /**
     * @var string DB_url.
     */
    private static $db_host = '';
    
    /**
     * @var String Database.
     */
    private static $database = '';
    
    /**
     * @var Object The MySQL connection object.
     */
    private static $client = '';
    
    /**
     * @var Object The current running instance of the object.
     */
    private static $instance;
    
    private function __construct()
    {
        
    }
    
    /**
     * Returns the *Singleton* instance of this class.
     * Sets up database connections
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) 
        {
            SELF::setDbCredentials();
            SELF::$client = mysqli_init();            
            SELF::$client->real_connect(SELF::$db_host, SELF::$username, SELF::$password, SELF::$database);
            
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
     * SetDbCredentials.
     * 
     * @return void
     */
    private function setDbCredentials()
    {
        SELF::$username = getenv('DB_USER');
        SELF::$password = getenv('DB_PASS');
        SELF::$db_host  = getenv('DB_URL');
        SELF::$database = getenv('DB_DB');
        
        $ssl_check = getenv('DB_SSL');
        if(isset($ssl_check) && ('1' === $ssl_check) ) 
        {
            SELF::$use_SSL = true;
        }
    }
    
    /**
     * Query.
     * 
     * @param String $query The sql query.
     * 
     * @return Mixed The data in the form of an array, otherwise false (if an update or anything else).
     */
    public static function query($query)
    {
        $result = mysqli_query(SELF::$client, $query);

        if(is_object($result))
        {            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);;
        } else {
            return array();
        }
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