<?php

require_once "autoload.php";
$data = json_decode(file_get_contents("php://input"),true);
$login = new Login();
echo $login->validate($data);