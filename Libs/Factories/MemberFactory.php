<?php

namespace Manager\Libs\Factories;

use Manager\Libs\Interfaces\FactoryInterface;

class MemberFactory implements FactoryInterface
{
    /**
     * Creates a Student object
     * 
     * @return \Manager\libs\Factories\Student
     */
    public static function create()
    {
        return new Student();
    }
}