<?php
$host = getenv('MYSQL_HOST');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$db   = getenv('MYSQL_DATABASE');
$port = getenv('MYSQL_PORT');
$pdo = new PDO(
    "mysql:host=" . $host . ";port=". $port ."dbname=" . $db,
    $user,
    $pass
);
// $pdo = new PDO("mysql:host=localhost;dbname=shopmmerce","root","");