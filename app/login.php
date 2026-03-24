<?php
include "./autoload.php";
$data = json_decode(file_get_contents("php://input"), true);
$login = new Login($pdo);
echo $login->validate($data);
