<?php
include_once dirname(__FILE__)."/../db_connector.php";

class Team extends OracleConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array|false
     *
     * Get team count
     */
    public function getteamcount(){
        $sql = "SELECT count(*) FROM team_info";
        return $this->select($sql);
    }

    /**
     * @return array|false
     *
     * Get total team list
     */
    public function getteamlist_all(){
        $sql = "SELECT ROWNUM, team_info.* FROM team_info";
        return $this->select($sql);
    }

    /**
     * @param $pagination_start
     * @return array|false
     *
     * Get team list with pagination
     */
    public function getteamlist_pagination($pagination_start){
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum,team_info.* FROM team_info) WHERE seqnum BETWEEN :range_start AND :range_end";
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
     * Get team stadium name
     */
    public function getteamstadium($teamid){
        $sql = "SELECT stadiumname FROM team_homeground WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $teamid
     * @return array|false
     *
     * Get team individual information
     */
    public function getteaminfo_individual($teamid){
        $sql = "SELECT * FROM team_info WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $teamid
     * @return array|false
     *
     * Get teaminformation - players count
     */
    public function getteaminfo_playerscount($teamid){
        $sql = "SELECT count(*) FROM player_info WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $teamid
     * @return array|false
     *
     * Get teaminformation - players information
     */
    public function getteaminfo_players($teamid){
        $sql = "SELECT * FROM player_info WHERE teamid=:teamid";
        $bucket = array(
            ":teamid"=>$teamid
        );
        return $this->select($sql,$bucket);
    }

    /**
     * @param $pagination_start
     * @return array|false
     *
     * Get teaminformation - players information by pagination
     */
    public function getteaminfo_players_pagination($teamid,$pagination_start)
    {
        $sql = "SELECT * FROM (SELECT ROWNUM as seqnum, player_info.* FROM player_info WHERE teamid=:teamid) WHERE seqnum BETWEEN :range_start AND :range_end";
        // Pagination content number range : *1 ~ *0
        $bucket = array(
            ":teamid" => $teamid,
            ":range_start"=>$pagination_start + 1,
            ":range_end"=>$pagination_start + PAGINATION_PLAYER_TEAMPAGE
        );
        return $this->select($sql,$bucket);
    }
}

?>