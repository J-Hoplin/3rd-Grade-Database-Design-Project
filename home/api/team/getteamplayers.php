<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class getteamplayers extends restful_api{
    protected static function GET()
    {
        $obj = new Team();
        if(isset($_GET['teamid'])){
            if(isset($_GET['pagination'])){
                $res = $obj->getteaminfo_players_pagination($_GET['teamid'],$_GET['pagination']);
                if($res){
                    return self::buildResultJSON($res);
                }
            }else{
                $res = $obj->getteaminfo_players($_GET['teamid']);
                if($res){
                    return self::buildResultJSON($res);
                }
            }
            return self::buildResultJSON(FAILTOPROCESS,500);
        }else{
            return self::buildResultJSON(FAILTOPROCESS,500);
        }
    }
}

getteamplayers::listen();