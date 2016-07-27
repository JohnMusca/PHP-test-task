<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

use Libs\Factories;

class MemberFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $email_address = 'john.m@testemail.com.au';
    
    protected $status = 'subscribed';
    
    protected $email_type = 'html';
    
    protected $member = Null;
    
    protected function setUp()
    {
        $this->member = \Libs\Factories\MemberFactory::create();
    }
    
    protected function tearDown()
    {
        $this->member = Null;
    }
    
    public function testCreate()
    {
        $this->assertInstanceOf("\Libs\Member", $this->member);
    }
}
?>
