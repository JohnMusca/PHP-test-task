<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

class MailChimpFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $api_endpoint = 'https://<dc>.api.mailchimp.com/3.0';
    
    protected $mailChimp = Null;
    
    public function setUp()
    {
        $this->mailChimp = \Libs\Factories\MailChimpFactory::create();
    }
    
    public function tearDown()
    {
        $this->mailChimp = Null;
    }
    
    /**
     * Not yet implemented, need to think of good ways to test this.
     */
    public function testCreate()
    {
        $this->assertInstanceOf("\Libs\DataService\MailChimp", $this->mailChimp);
    }
}
?>
