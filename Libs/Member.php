<?php

namespace Manager;

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
     * Magic method, get.
     * 
     * @param String $name The name of the private variable to access.$this
     * 
     * @return String The value of the variable accessed or false.
     */
    public function __get($name)
    {
        return (isset($this->$name) ? $this->$name : false);
    }
}