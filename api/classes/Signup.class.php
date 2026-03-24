<?php

class Signup{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function userExist($data){
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email",$data["email"]);
        $stmt->execute();
        if($stmt->fetch(PDO::FETCH_ASSOC) > 0){
            return true;
        }else{
            return false;
        }
    }

    private function signUpErrors($data){
        if($this->userExist($data)){
            return true;
        }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    public function run($data){
        $result = [
            "status" => "",
            "message" => ""
        ];
        $hashedPwd = password_hash($data['password'],PASSWORD_BCRYPT,["cost"=>10]);
        $query = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":fullname",$data['fullname']);
        $stmt->bindParam(":email",$data['email']);
        $stmt->bindParam(":password",$hashedPwd);
        if(!$this->signUpErrors($data)){
            $stmt->execute();
            $result["status"] = "success";
            $result["message"] = "Signup successful";
        }else{
            $result["status"] = "error";
            $result["message"] = "Signup failed, check inputs and try again";
        }
        return json_encode($result);
    }
}