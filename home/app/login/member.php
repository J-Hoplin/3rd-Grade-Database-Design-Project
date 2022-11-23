<?php

include_once dirname(__FILE__)."/../db_connector.php";
include_once dirname(__FILE__)."/../../common/validator.php";
include_once "member_interface.php";

class Member extends OracleConnector implements memberable {
    public function __construct()
    {
        parent::__construct();
    }

    public static function passwordencrypt($password){
        return base64_encode(hash('sha256',$password, true));
    }

    public function enroll($username,$email,$password)
    {
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

    public function checkemailenrolled($email){
        $sql = "SELECT email FROM member where email=:email ";
        $bucket = array(
            ":email"=>$email
        );
        return $this->select($sql,$bucket);
    }

    public function signinvalidation($email){
        $sql = "SELECT id,username,password FROM member where email=:email";
        $bucket = array(
            ":email"=>$email
        );
        return $this->select($sql,$bucket);
    }

    public function getinformation()
    {
        // TODO: Implement getinformation() method.
    }

    public function setinfomration()
    {
        // TODO: Implement setinfomration() method.
    }
}


?>