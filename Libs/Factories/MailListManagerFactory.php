<?php

namespace Libs\Factories;

use Libs;
use Libs\Interfaces\FactoryInterface;

class MailListManagerFactory implements FactoryInterface
{
    /**
     * Creates a MailList object.
     * 
     * @return \libs\Factories\Classroom
     */
    public static function create()
    {
        return new Libs\MailListManager();
    }
}
