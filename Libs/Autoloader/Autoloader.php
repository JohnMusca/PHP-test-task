<?php
//TODO: Implement later
/*
spl_autoload_register(function ($class) {

    $paths = [];
    
    $path_seperator = ';';
    
    $include_path = get_include_path() . $path_seperator . getcwd() . "\\Libs\Controllers\\";

    set_include_path($include_path);
    
    
    $paths['pathControllers'] = "/Libs/Controllers/" . $class . ".php";
 
    $paths['pathLibs'] = 'Libs/' . $class . '.php';
    $paths['pathFactories'] = 'Libs/Factories' . $class . '.php';
    $paths['pathDataservice'] = 'Libs/DataService' . $class . '.php';
    $paths['pathInterfaces'] = 'Libs/Interfaces' . $class . '.php';

    foreach($paths as $path) {
        require_once $path;
    }
   
});
*/

require_once('Libs/Interfaces/FactoryInterface.php');
require_once('Libs/Interfaces/SingletonInterface.php');
require_once('Libs/Controllers/MailChimpController.php');
require_once('Config/Config.php');
require_once('Libs/DataService/MailChimp.php');
require_once('Libs/Factories/MailListFactory.php');
require_once('Libs/Factories/MemberFactory.php');
require_once('Libs/MailList.php');
require_once('Libs/Member.php');