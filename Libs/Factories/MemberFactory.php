<?php

namespace Libs\Factories;

use Libs;
use Libs\Interfaces\FactoryInterface;

class MemberFactory implements FactoryInterface
{
    /**
     * Creates a Member object
     * 
     * @return \libs\Factories\Student
     */
    public static function create()
    {
        return new Libs\Member();
    }
}