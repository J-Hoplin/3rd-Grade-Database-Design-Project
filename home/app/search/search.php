<?php

include_once dirname(__FILE__)."/../db_connector.php";

class Search extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $keyword
     * @return array|false
     *
     * Get player list filtering by
     */
    public function getsearchlist($keyword){
        $sql = "SELECT ROWNUM as seqnum, player_info.* FROM player_info WHERE playername LIKE :keyword";
        $bucket = array(
            ":keyword" => '%'.$keyword.'%',
        );
        return $this->select($sql,$bucket);
    }

    public function getplayerlist_pagination($keyword,$pagination_start){
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum, player_info.* FROM player_info WHERE playername LIKE :keyword) WHERE seqnum BETWEEN :range_start AND :range_end";
        $bucket = array(
            ":keyword" => '%'.$keyword.'%',
            ":range_start" => $pagination_start + 1,
            ":range_end" => $pagination_start + PAGINATION
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