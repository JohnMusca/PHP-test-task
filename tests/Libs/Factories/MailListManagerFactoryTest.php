<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

use Libs\Factories;

class MailListManagerFactoryTest extends PHPUnit_Framework_TestCase
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
    
    public function testCreate()
    {
        $this->assertInstanceOf("\Libs\MailListManager", $this->mailListManager);
    }
    
}
?>
