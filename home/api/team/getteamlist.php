<?php

include_once dirname(__FILE__)."/../RestAPI/RestAPI.php";

class teamlist extends restful_api{
    protected static function GET()
    {
        $obj = new Team();
        if(isset($_GET["pagination"])){
            $res = $obj->getteamlist_pagination($_GET["pagination"]);
            if($res){
                return self::buildResultJSON($res);
            }else{
                return self::buildResultJSON(FAILTOPROCESS,500);
            }
        }else{
            $res = $obj->getteamlist_all();
            if($res){
                return self::buildResultJSON($res);
            }else{
                return self::buildResultJSON(FAILTOPROCESS,500);
            }
        }
    }
}

teamlist::listen();