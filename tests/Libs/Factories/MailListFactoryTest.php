<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

class MailListFactoryTest extends PHPUnit_Framework_TestCase
{
	protected $visibility = 'pub';

	protected $mailList = Null;
	
	protected function setUp()
    {
        $this->mailList = \Libs\Factories\MailListFactory::create();
    }
    
	protected function tearDown()
    {
        $this->member = Null;
    }
	
	public function test__get()
	{
		$this->assertEquals($this->mailList->__get('visibility'), $this->visibility);
	}
}
?>
