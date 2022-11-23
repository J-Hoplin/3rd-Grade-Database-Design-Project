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
     * @return false
     *
     * execute SQL Query
     *
     * return array type
     *
     * each array key refers to column of app
     */

    private function queryexecution($query,$bucket){
        $stid = oci_parse($this->connect,$query);
        /**
         * Require bucket
         *
         * for oracle query security query buildment
         */
        if(count($bucket)){
            foreach ($bucket as $key => $value){
                oci_bind_by_name($stid,$key,$bucket[$key]);
            }
        }
        return oci_execute($stid) ? $stid : false;
    }

    protected function select($query,$bucket = array()){
        $result = array();
        $stid = $this->queryexecution($query,$bucket);
        if(!$stid){
            return false;
        }
        oci_fetch_all($stid,$result,0,-1,OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    protected function insert($query,$bucket = array()){
        return $this->queryexecution($query,$bucket);
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

    public static function echod(){
        echo "hello world";
    }
}
