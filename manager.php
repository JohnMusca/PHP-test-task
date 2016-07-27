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

$mailChimpController = new Manager\Libs\Controllers\MailChimpController;
$mailChimpController->run();