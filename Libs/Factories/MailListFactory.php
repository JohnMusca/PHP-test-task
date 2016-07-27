<?php

namespace Manager\Libs\Factories;

use Manager\Libs\Interfaces\FactoryInterface;

class MailListFactory implements FactoryInterface
{
    /**
     * Creates a classroom object.
     * 
     * @return \Manager\libs\Factories\Classroom
     */
    public static function create()
    {
        return new Classroom();
    }
}
