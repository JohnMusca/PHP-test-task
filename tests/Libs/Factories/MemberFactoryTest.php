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
	
	public function test__get()
	{
		$this->assertEquals($this->member->__get('email_address'), $this->email_address);
	}
	
	public function test__set()
	{
		$test_email = 'jm@test.com';
		$this->member->__set('email_address', $test_email);
		$this->assertEquals($this->member->__get('email_address'), $test_email);
	}
}
?>
