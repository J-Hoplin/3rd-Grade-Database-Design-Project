<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class playercount extends restful_api{
    protected static function GET()
    {
        $obj = new Player();
        $res = $obj->getplayercount();
        if($res){
            return self::buildResultJSON($res[0]["COUNT(*)"]);
        }else{
            return self::buildResultJSON(FAILTOPROCESS,500);
        }
    }
}

playercount::listen();