<?php
//TODO: Implement later

class Autoloader {
    static public function loader($className) {
        $filename = str_replace('\\', '/', $className) . ".php";

        if (file_exists($filename)) {
            include($filename);
        }
    }
}
spl_autoload_register('Autoloader::loader');
