<?php

namespace Manager\libs\Factories;

class StudentFactory implements FactoryInterface
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