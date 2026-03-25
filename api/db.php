<?php
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');
// $pdo = new PDO(
//     "mysql:host=" . $host . ";port=". $port ."dbname=" . $db,
//     $user,
//     $pass
// );
$pdo = new PDO("mysql:host=localhost;dbname=shopmmerce","root","");
