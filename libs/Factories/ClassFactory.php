<?php

namespace Manager\libs\Factories;

class ClassFactory implements FactoryInterface
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
