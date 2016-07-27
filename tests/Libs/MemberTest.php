<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

use Libs\Factories;

class MemberTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals($this->member->__get('status'), $this->status);
        $this->assertEquals($this->member->__get('email_type'), $this->email_type);
        
        $this->assertNotEquals($this->member->__get('email_address'), $this->email_address . 'test');
        $this->assertNotEquals($this->member->__get('status'), $this->status . 'test');
        $this->assertNotEquals($this->member->__get('email_type'), $this->email_type . 'test');
    }
    
    public function test__set()
    {
        $test_email = 'jm@test.com';
        $this->member->__set('email_address', $test_email);
        $this->assertEquals($this->member->__get('email_address'), $test_email);
        
        $test_status = 'test';
        $this->member->__set('status', $test_status);
        $this->assertEquals($this->member->__get('status'), $test_status);
        
        $test_email_type = 'another_test';
        $this->member->__set('email_type', $test_email_type);
        $this->assertEquals($this->member->__get('email_type'), $test_email_type);
        
        $test_email = 'jm2222@test.com';
        $this->member->__set('email_type', $test_email);
        $this->assertNotEquals($this->member->__get('email_address'), $test_email . 'test');
        
        $test_status = 'test2222';
        $this->member->__set('email_type', $test_status);
        $this->assertNotEquals($this->member->__get('status'), $test_status . 'test');
        
        $test_email_type = 'another_test2222';
        $this->member->__set('email_type', $test_email_type);
        $this->assertNotEquals($this->member->__get('email_type'), $test_email_type . 'test');
    }
}
?>
