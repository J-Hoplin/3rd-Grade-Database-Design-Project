<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class playerlist extends restful_api{
    protected static function GET()
    {
        $obj = new Player();
        if(isset($_GET["pagination"])){
            $res = $obj->getplayerlist_pagination($_GET["pagination"]);
            if($res){
                return self::buildResultJSON($res);
            }
        }else{
            $res = $obj->getplayerlist_all();
            if($res){
                return self::buildResultJSON($res);
            }
        }
        return self::buildResultJSON(FAILTOPROCESS,500);
    }
}

playerlist::listen();