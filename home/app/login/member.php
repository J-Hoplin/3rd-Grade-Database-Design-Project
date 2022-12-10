<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Member extends OracleConnector {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     * @return false|resource
     *
     * Make an member enrollment
     */
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

    /**
     * @param $username
     * @return array|false
     *
     * Check if username already in used
     */
    public function checkusernameenrolled($username){
        $sql = "SELECT username FROM member where username=:username";
        $bucket = array(
            ":username"=>$username
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $email
     * @return array|false
     *
     * Check if email already in used
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
     * @param $username
     * @return array|false
     *
     * Returns some values that require while signin
     */
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