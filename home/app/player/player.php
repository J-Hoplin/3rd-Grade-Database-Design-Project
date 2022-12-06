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
        // Pagination content number range : *1 ~ *0
        $bucket = array(
            ":range_start"=>$pagination_start + 1,
            ":range_end"=>$pagination_start + PAGINATION
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $teamid
     * @return array|false
     *
     * Get team name
     */
    public function getteamname($teamid){
        $sql = "SELECT teamname FROM team_info WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $playerid
     * @return array|false
     *
     * Get player's individual information
     */
    public function getplayerinfo_individual($playerid){
        $sql = "SELECT * FROM player_info WHERE playerid=:playerid";
        $bucket = array(
            ":playerid" => $playerid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $playerid
     * @param $history_pagination
     * @return array|false
     *
     * Returns player's previous league history
     */
    public function getplayerprevhistory($playerid,$history_pagination){
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum, player_prev_league.* FROM player_prev_league WHERE playerid=:playerid) WHERE seqnum BETWEEN :range_start AND :range_end";
        $bucket = array(
            ":playerid" => $playerid,
            ":range_start" => 1,
            ":range_end" => $history_pagination
        );
        return $this->select($sql,$bucket);
    }
}

?>