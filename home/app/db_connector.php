<?php

class OracleConnector{
    protected $db;
    protected $connect;

    // constructor
    protected function __construct()
    {
        $config = parse_ini_file(dirname(__FILE__)."/../assets/config/config.ini");
        $this->db = '
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
        $this->connect = oci_connect($config['username'],$config['password'],$this->db);
        if(!$this->connect){
            $e=oci_error();
            trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
        }
    }

    /**
     * @param $query
     * @return array
     *
     * execute SQL Query
     *
     * return array type
     *
     * each array key refers to column of app
     */
    protected function executeQuery($query){
        $result = array();
        $stid = oci_parse($this->connect,$query);
        oci_execute($stid);
        oci_fetch_all($stid,$result);
        return $result;
    }

    /**
     * @return void
     * make commit to app
     */
    protected function commitDB(){
        oci_commit($this->connect);
    }

    /**
     * @return void
     *
     * close db connection
     */
    public function closeConnection(){
        oci_close($this->connect);
    }
}
?>