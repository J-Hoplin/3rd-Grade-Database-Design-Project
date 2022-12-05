<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Myinfo extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email
     * @return array|false
     *
     * Check if email already enrolled
     */
    public function checkemailenrolled($email){
        // Use in signup
        $sql = "SELECT email FROM member where email=:email ";
        $bucket = array(
            ":email"=>$email
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $id
     * @return array|false
     *
     * Get member's information
     */
    public function getinformation($id)
    {
        // Use in mypage
        $sql = "SELECT email,password FROM member where id=:id";
        $bucket = array(
            ":id"=>$id
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return false|resource
     *
     * update user's information
     */
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