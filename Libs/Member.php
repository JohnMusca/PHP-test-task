<?php

namespace Libs;

Class Member
{
    /**
     * @var string $email_address
     */
    private $email_address = "john.m@testemail.com.au";
    
    /**
     * @var string $status
     */
    private $status = "subscribed";
    
    /**
     * @var string $email_type
     */
     private $email_type = "html";
    
    /**
     * Magic method, get.
     * 
     * @param sString $name The name of the private variable to access.
     * 
     * @return string The value of the variable accessed or false.
     */
    public function __get($name)
    {
        return (isset($this->$name) ? $this->$name : false);
    }
    
    /**
     * Magic method, set.
     * 
     * @param string $name  The name of the private variable to access.
     * @param string $value The value to update.
     * 
     * @return String The value of the variable accessed or false.
     */
    public function __set($name, $value)
    {
        (isset($this->$name) ? $this->$name = $value : false);
    }
}