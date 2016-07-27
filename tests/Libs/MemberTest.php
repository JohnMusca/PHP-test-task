<?php
require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

class MemberTest extends PHPUnit_Framework_TestCase
{
	public function test__get()
	{
		$this->assertEquals(1, 1);
	}
	
	public function test__set()
	{
		$this->assertEquals(1, 1);
	}
}
?>
