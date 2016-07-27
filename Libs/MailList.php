<?php

namespace Libs;

use Libs\Factories;

Class MailList 
{
    /**
     * @var string $name
     */
    private $name = 'Johns list';
    
    /**
     * @var array $contact
     */
    private $contact = ["company"  => "MailChimp",
                        "address1" => "675 Ponce De Leon Ave NE",
                        "address2" => "Suite 5000",
                        "city"     => "Atlanta",
                        "state"    => "GA",
                        "zip"      => "30308",
                        "country"  => "US",
                        "phone"    => ""];
    
    /**
     * @var string $permission_reminder
     */
    private $permission_reminder = 'Test';
    
    /**
     * @var array $campaign_defaults
     */
    private $campaign_defaults =  ["from_name"  => "Freddie",
                                   "from_email" => "freddie@freddiehats.com",
                                   "subject"    => "",
                                   "language"   => "en"];
                                
    /**
     * @var string $visibility
     */   
    private $visibility = "pub";
    
    /**
     * @var boolean $email_type_option
     */
    private $email_type_option = True;
        
    /**
     * Magic method, get.
     * 
     * @param string $name The name of the private variable to access.
     * 
     * @return string The value of the variable accessed or false.
     */
    public function __get($name)
    {
        return (isset($this->$name) ? $this->$name : false);
    }
}