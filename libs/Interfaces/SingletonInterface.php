<?php

namespace Manager\libs\Interfaces;

interface SingletonInterface
{   
    public static function getInstance();
    
    private function __clone();
    
    private function __wakeup();
}