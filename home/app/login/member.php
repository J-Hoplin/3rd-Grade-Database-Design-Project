<?php

include_once "../db_connector.php";
include_once "member_interface.php";
include_once "../../common/validator.php";

class Member extends OracleConnector implements memberable {
    public function __construct()
    {
        parent::__construct();
    }


    public function enroll()
    {
        // TODO: Implement enroll() method
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