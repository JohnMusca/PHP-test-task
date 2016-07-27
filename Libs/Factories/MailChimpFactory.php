<?php

namespace Libs\Factories;

use Manager;
use Config;
use Libs\Interfaces\FactoryInterface;

class MailChimpFactory implements FactoryInterface
{
    /**
     * Creates a Mailchimp object.
     * 
     * @return \libs\DataService\MailChimp
     */
    public static function create()
    {
        //get current instance of config
        $config = \Config\Config::getInstance();
        
        //pass instance of config
        return \libs\DataService\MailChimp::getInstance($config);
    }
}
