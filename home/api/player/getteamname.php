<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class getteamname extends restful_api{
    protected static function GET(){
        $obj = new Player();
        if(isset($_GET['teamid'])){
            $res = $obj->getteamname($_GET['teamid']);
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

getteamname::listen();