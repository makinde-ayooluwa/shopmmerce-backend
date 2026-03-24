<?php
class Login{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function validate($data){
        $result = [
            "status" => "",
            "message" => ""
        ];
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email",$data['email']);
        // $stmt->bindParam(":pwd",$data['password']);
        $stmt->execute();
        $dbResult = $stmt->fetch(PDO::FETCH_ASSOC);
        if($dbResult > 0 && password_verify($data["password"], $dbResult["password"])){
            $result["status"] = "success";
            $result["message"] = "Login successful";
        }else{
            $result["status"] = "error";
            $result["message"] = "Login failed";
        }
        return json_encode($result);
    }
}