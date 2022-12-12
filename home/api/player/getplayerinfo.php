<?php


include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class getplayerinfo extends restful_api{
    protected static function GET()
    {
        $obj = new Player();
        if(isset($_GET['playerid'])){
            $res = $obj->getplayerinfo_individual($_GET['playerid']);
            if($res){
                return self::buildResultJSON($res[0]);
            }else{
                return self::buildResultJSON(FAILTOPROCESS,500);
            }
        }else{
            return self::buildResultJSON("Player ID not found",500);
        }
    }
}

getplayerinfo::listen();