<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header("Content-type: application/json");
    spl_autoload_register("autoload");
    include "./db.php";
function autoload($class_name)
{
    $paths = ["classes/"];
    $extention = ".class.php";
    foreach ($paths as $path) {
        $fullpath = $path . $class_name . $extention;
        if (file_exists($fullpath)) {
            require_once $fullpath;
        }
    }
}
