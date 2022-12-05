<?php

/**
 * Should close connection after off the page
 */

include_once dirname(__FILE__)."/../common/constant.php";

class OracleConnector{
    private $db;
    private $connect;
    private $config;

    // constructor : prevent OracleConnector to use as instance directly
    protected function __construct()
    {
        $this->config = parse_ini_file(dirname(__FILE__)."/../assets/config/config.ini");
        $this->db = '(DESCRIPTION= (ADDRESS_LIST= (ADDRESS = (PROTOCOL ='.$this->config['protocol'].')(HOST = '.$this->config['host'].')(PORT = '.$this->config['port'].'))) (CONNECT_DATA = (SID = orcl)))';
        $this->makeConnect();
    }

    private function makeConnect(){
        $this->connect = oci_connect($this->config['username'],$this->config['password'],$this->db);
        if(!$this->connect){
            $e=oci_error();
            trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
        }
    }
    public static function passwordencrypt($password){
        return base64_encode(hash('sha256',$password, true));
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

    /**
     * @param $query
     * @param $bucket
     * @return false|resource
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
        return oci_execute($stid,OCI_COMMIT_ON_SUCCESS) ? $stid : false;
    }

    protected function select($query,$bucket = array()){
        /**
         * Should use upper case word if parsing fetch_all
         */
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

    protected function update($query,$bucket = array()){
        return $this->queryexecution($query,$bucket);
    }

    protected function delete($query,$bucket = array()){
        return $this->queryexecution($query,$bucket);
    }

}
