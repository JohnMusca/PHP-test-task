<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

use Libs\Factories;

class MailListManagerTest extends PHPUnit_Framework_TestCase
{
    
    protected $mailListManager = Null;
    
    protected function setUp()
    {
        $this->mailListManager = \Libs\Factories\MailListManagerFactory::create();
    }
    
    protected function tearDown()
    {
        $this->mailListManager = Null;
    }
    
    public function testCreateList()
    {
        //not yet implemented
        $this->assertEquals(1, 1);
    }
    
    public function testAddMember()
    {
        //not yet implemented
        $this->assertEquals(1, 1);
    }
    
    public function testUpdateMember()
    {
        //not yet implemented
        $this->assertEquals(1, 1);
    }
    
}