<?php 

require_once("Libs/Autoloader/Autoloader.php");
require_once("vendor/autoload.php");

/**
 * Usage:
 * 
 * php manager.php
 * 
 * This will create a list, add the user object to the list and update the user object.
 */

$obj = new Manager\Libs\Controllers\MailChimpController; // instantiates object of class foo\Another