<?php
spl_autoload_register(function ($class) {

    $pathLibs = 'libs/' . $class . '.php';
    $pathFactories = 'libs/Factories' . $class . '.php';
    $pathDatabase = 'libs/Database' . $class . '.php';
    $pathInterfaces = 'libs/Interfaces' . $class . '.php';

    require_once $pathContorllers;
    require_once $pathFactories;
    require_once $pathDatabase;
    require_once $pathInterfaces;
});

