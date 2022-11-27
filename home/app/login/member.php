<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Member extends OracleConnector {
    public function __construct()
    {
        parent::__construct();
    }

    public static function passwordencrypt($password){
        return base64_encode(hash('sha256',$password, true));
    }

    public function enroll($username,$email,$password)
    {
        // Use in signup
        $id = uniqid();
        $sql = "INSERT INTO member VALUES (:id,:username, :password, :email)";
        $bucket = array(
            ":id" => $id,
            ":username"=>$username,
            ":email"=>$email,
            ":password"=>$password
        );
        return $this->insert($sql,$bucket);
    }

    public function checkusernameenrolled($username){
        $sql = "SELECT email FROM member where username=:username";
        $bucket = array(
            ":username"=>$username
        );
        return $this->select($sql,$bucket);
    }

    public function checkemailenrolled($email){
        // Use in signup
        $sql = "SELECT email FROM member where email=:email ";
        $bucket = array(
            ":email"=>$email
        );
        return $this->select($sql,$bucket);
    }

    public function signinvalidation($username){
        // Use in sigin
        $sql = "SELECT id,username,password FROM member where username=:username";
        $bucket = array(
            ":username"=>$username
        );
        return $this->select($sql,$bucket);
    }
}


?>