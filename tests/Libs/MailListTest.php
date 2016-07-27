<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

use Libs\Factories;

class MailListTest extends PHPUnit_Framework_TestCase
{
    protected $name = 'Johns list';
    
    protected $contact = ["company"  => "MailChimp",
                          "address1" => "675 Ponce De Leon Ave NE",
                          "address2" => "Suite 5000",
                          "city"     => "Atlanta",
                          "state"    => "GA",
                          "zip"      => "30308",
                          "country"  => "US",
                          "phone"    => ""];

    protected $permission_reminder = 'Test';
    
    protected $campaign_defaults =  ["from_name"  => "Freddie",
                                   "from_email" => "freddie@freddiehats.com",
                                   "subject"    => "",
                                   "language"   => "en"];
 
    protected $visibility = "pub";
    
    protected $email_type_option = True;
    
    protected $mailList = Null;
    
    protected function setUp()
    {
        $this->mailList = \Libs\Factories\MailListFactory::create();
    }
    
    protected function tearDown()
    {
        $this->mailList = Null;
    }
    
    public function test__get()
    {
        $this->assertEquals($this->mailList->__get('name'), $this->name);
        $this->assertEquals($this->mailList->__get('contact'), $this->contact);
        $this->assertEquals($this->mailList->__get('permission_reminder'), $this->permission_reminder);
        $this->assertEquals($this->mailList->__get('campaign_defaults'), $this->campaign_defaults);
        $this->assertEquals($this->mailList->__get('visibility'), $this->visibility);
        $this->assertEquals($this->mailList->__get('email_type_option'), $this->email_type_option);
        
        $this->assertNotEquals($this->mailList->__get('name'), $this->name . 'test');
        $this->assertNotEquals($this->mailList->__get('contact'), []);
        $this->assertNotEquals($this->mailList->__get('permission_reminder'), $this->permission_reminder . 'test');
        $this->assertNotEquals($this->mailList->__get('campaign_defaults'), []);
        $this->assertNotEquals($this->mailList->__get('visibility'), $this->visibility . 'test');
        $this->assertNotEquals($this->mailList->__get('email_type_option'), False);
        
    }
    
    public function testCreateList()
    {
        //not yet implemented, need to create mock objects
    }
    
    public function testAddMember()
    {
        //not yet implemented, need to create mock objects
    }
    
    public function testUpdateMember()
    {
        //not yet implemented, need to create mock objects
    }
}
?>
