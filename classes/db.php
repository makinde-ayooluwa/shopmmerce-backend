<?php

$pdo = new PDO(
    "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS')
);
// $pdo = new PDO("mysql:host=localhost;dbname=shopmmerce","root","");