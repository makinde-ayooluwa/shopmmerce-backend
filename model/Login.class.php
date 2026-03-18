<?php

class Login{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . $_SERVER["HTTP_HOST"] . ";dbname=shopmmerce");
    }
    public function run($data){
        echo "Hi";
    }
}