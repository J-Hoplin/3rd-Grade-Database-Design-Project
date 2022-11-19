<?php

class OracleConnector{

    protected $db;
    protected $connect;

    // constructor
    public function __construct()
    {
        $config = parse_ini_file(dirname(__FILE__)."/../assets/config/config.ini");
        $db = '
        (DESCRIPTION= 
            (ADDRESS_LIST= 
                (ADDRESS = 
                    (PROTOCOL ='.$config['protocol'].')
                    (HOST = '.$config['host'].')
                    (PORT = '.$config['port'].')
                )
            ) 
            (CONNECT_DATA = 
                (SID = orcl)
            )
        )';
        $connect = oci_connect($config['username'],$config['password'],$db);
        if(!$connect){
            $e=oci_error();
            trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
        }else{
            echo "Connection success";
        }
    }
}


$t = new OracleConnector();

?>