<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Withdraw extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * @return array|false
     *
     * Get user's password
     */
    public function getpassword($id){
        $sql = "SELECT password FROM member where id=:id";
        $bucket = array(
            ":id" => $id
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $id
     * @return false|resource
     *
     * Delete user
     */
    public function deleteuser($id){
        $sql = "DELETE FROM member where id=:id";
        $bucket = array(
            ":id" => $id
        );
        return $this->delete($sql,$bucket);
    }
}
