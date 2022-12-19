<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class getplayerhistory extends restful_api{
    protected static function GET()
    {
        $obj = new Player();
        if(isset($_GET['playerid'])){
            $res = $obj->getplayerprevhistory($_GET['playerid'],$_GET['pagination'] || 10);
            if($res){
                return self::buildResultJSON($res);
            }else{
                return self::buildResultJSON(FAILTOPROCESS,500);
            }
        }else{
            return self::buildResultJSON("Team ID not found",500);
        }
    }
}

getplayerhistory::listen();