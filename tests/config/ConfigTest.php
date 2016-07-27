<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

class ConfigTest extends PHPUnit_Framework_TestCase
{
    protected $api_key_test = '11c965bd582f1a12acefcc4cf8bd365a-us13';
    
    protected $config = Null;
    
    protected function setUp()
    {
        $this->config = \Config\Config::getInstance();
    }
    
    protected function tearDown()
    {
        $this->config = Null;
    }
    
    public function test__get()
    {
        $this->assertEquals($this->config->__get('api_key'), $this->api_key_test);
        $this->assertNotEquals($this->config->__get('api_key'), $this->api_key_test . 'test');
    }
}
?>
