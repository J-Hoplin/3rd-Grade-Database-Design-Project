<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Myinfo extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkemailenrolled($email){
        // Use in signup
        $sql = "SELECT email FROM member where email=:email ";
        $bucket = array(
            ":email"=>$email
        );
        return $this->select($sql,$bucket);
    }

    public function getinformation($id)
    {
        // Use in mypage
        $sql = "SELECT email,password FROM member where id=:id";
        $bucket = array(
            ":id"=>$id
        );
        return $this->select($sql,$bucket);
    }

    public function updateinfomration($id,$email,$password)
    {
        // Use in mypage
        $sql = "UPDATE member SET password=:password, email=:email where id=:constraint";
        $bucket = array(
            ":id"=>$id,
            ":email"=>$email,
            ":password"=>$password,
            ":constraint"=>$id
        );
        return $this->update($sql,$bucket);
    }
}