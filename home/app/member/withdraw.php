<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Withdraw extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getpassword($id){
        $sql = "SELECT password FROM member where id=:id";
        $bucket = array(
            ":id" => $id
        );
        return $this->select($sql,$bucket);
    }

    public function deleteuser($id){
        $sql = "DELETE FROM member where id=:id";
        $bucket = array(
            ":id" => $id
        );
        return $this->delete($sql,$bucket);
    }
}
