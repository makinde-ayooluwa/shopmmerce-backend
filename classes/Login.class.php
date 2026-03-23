<?php

class Login{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . $_SERVER["HTTP_HOST"] . ";dbname=shopmmerce");
    }
    public function validate($data){
        $result = [
            "status" => "",
            "message" => ""
        ];
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email",$data['email']);
        $stmt->execute();
        if($stmt->fetch(PDO::FETCH_ASSOC) > 0){
            $result["status"] = "success";
            $result["message"] = "User successfully logged in";
        }else{
            $result["status"] = "error";
            $result["message"] = "User does not exist";
        }
        return json_encode($result);
    }
}