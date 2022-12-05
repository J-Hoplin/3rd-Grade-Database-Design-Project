<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Player extends OracleConnector
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array|false
     *
     * Get player count
     */
    public function getplayercount()
    {
        $sql = "SELECT count(*) FROM player_info";
        return $this->select($sql);
    }

    /**
     * @return array|false
     *
     * Get player list all
     */
    public function getplayerlist_all(){
        $sql = "SELECT ROWNUM, player_info.* FROM player_info";
        return $this->select($sql);
    }

    /**
     * @param $pagination_start
     * @return array|false
     *
     * Get player list based on pagination
     */
    public function getplayerlist_pagination($pagination_start)
    {
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum, player_info.* FROM player_info) WHERE seqnum BETWEEN :range_start AND :range_end";
        $bucket = array(
            ":range_start"=>$pagination_start + 1,
            ":range_end"=>$pagination_start + PAGINATION
        );
        return $this->select($sql,$bucket);
    }


    public function getteamname($teamid){
        $sql = "SELECT teamname FROM team_info WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

}