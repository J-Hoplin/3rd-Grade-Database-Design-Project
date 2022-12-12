<?php

include_once "codes.php";
include_once dirname(__FILE__)."/../../app/login/member.php";
include_once dirname(__FILE__)."/../../app/member/myinfo.php";
include_once dirname(__FILE__)."/../../app/member/withdraw.php";
include_once dirname(__FILE__)."/../../app/player/player.php";
include_once dirname(__FILE__)."/../../app/search/search.php";
include_once dirname(__FILE__)."/../../app/team/team.php";

class HTTPcodes{
    /**
     * available HTTP METHOD
     *
     */
    protected $validhttpmethod = array(
        "GET",
        "POST",
        "PUT",
        "DELETE"
    );
    /**
     * All common http status code should be like this
     *
     * {
     * "code"
     * "msg"
     * }
     */
    protected static $OK = array(
        "code" => 200,
        "msg" => OK
    );
    protected static $INVALIDREQUEST = array(
        "code" => 400,
        "msg" => ERR_400
    );
    protected static $INVALIDHTTPMETHOD = array(
        "code" => 405,
        "msg" => ERR_405
    );
    protected static $INVALIDRETURNTYPE = array(
        "code" => 500,
        "msg" => ERR_500
    );
    protected static $MIDDLEWARENOTCALLABLE = array(
        "code" => 500,
        "msg" => ERR_MIDDLEWARE_NOT_CALLABLE
    );

    protected static $MIDDLEWARESHOULDBEARRAY = array(
        "code" => 500,
        "msg" => ERR_MIDDLEWARE_NOT_ARRAY
    );

    protected static $MIDDLEWREEXCEPTIONOCCURED = array(
        "code" => 500,
        "msg" =>ERR_MIDDLEWARE_EXCEPTION
    );
}

?>