<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class teamcount extends restful_api{
    protected static function GET()
    {
        $obj = new Team();
        $res = $obj->getteamcount();
        if($res){
            return self::buildResultJSON($res[0]["COUNT(*)"]);
        }else{
            return self::buildResultJSON(FAILTOPROCESS,500);
        }
    }
}

teamcount::listen();