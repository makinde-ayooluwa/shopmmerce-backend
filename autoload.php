<?php
    spl_autoload_register("autoload");
function autoload($class_name)
{
    $paths = ["model/"];
    $extention = ".class.php";
    foreach ($paths as $path) {
        $fullpath = $path . $class_name . $extention;
        if (file_exists($fullpath)) {
            require_once $fullpath;
        }
    }
}
