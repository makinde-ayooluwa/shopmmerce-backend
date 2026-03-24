<?php

include "autoload.php";
$data = json_decode(file_get_contents("php://input"), true);
$userClass = new User($pdo);

echo $userClass->getSingleUser($data);
