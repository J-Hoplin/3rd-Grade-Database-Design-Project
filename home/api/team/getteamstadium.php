<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class teamstadium extends restful_api{
    protected static function GET()
    {
        $obj = new Team();
        if(isset($_GET['teamid'])){
            $res = $obj->getteamstadium($_GET['teamid']);
            if($res){
                return self::buildResultJSON($res[0]);
            }else{
                return self::buildResultJSON(FAILTOPROCESS,500);
            }
        }else{
            return self::buildResultJSON("Team ID not found",500);
        }
    }
}


teamstadium::listen();