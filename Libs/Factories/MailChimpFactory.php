<?php

namespace Manager\Libs\Factories;

use Manager;
use Manager\Config;
use Manager\Libs\Interfaces\FactoryInterface;

class MailChimpFactory implements FactoryInterface
{
    /**
     * Creates a Mailchimp object.
     * 
     * @return \Manager\libs\DataService\MailChimp
     */
    public static function create()
    {
        //get current instance of config
        $config = \Manager\Config\Config::getInstance();
        
        //pass instance of config
        return \Manager\libs\DataService\MailChimp::getInstance($config);
    }
}
