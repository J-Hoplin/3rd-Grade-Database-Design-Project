<?php
include_once dirname(__FILE__)."/../db_connector.php";

class Team extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getteamcount(){
        $sql = "SELECT count(*) FROM team_info";
        return $this->select($sql);
    }

    public function getteamlist_all(){
        $sql = "SELECT ROWNUM, team_info.* FROM team_info";
        return $this->select($sql);
    }

    public function getteamlist_pagination($pagination_start){
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum,team_info.* FROM team_info) WHERE seqnum BETWEEN :range_start AND :range_end";
        // Pagination content number range : *1 ~ *0
        $bucket = array(
            ":range_start"=>$pagination_start + 1,
            ":range_end"=>$pagination_start + PAGINATION
        );
        return $this->select($sql,$bucket);
    }

}

?>