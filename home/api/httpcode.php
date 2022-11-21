<?php
class HTTPcodes{
    /**
     * all of common http status code should be like this
     *
     * {
     * "code"
     * "msg"
     * }
     */
    protected static $OK = array(
        "code" => 200,
        "msg" => "OK"
    );
    protected static $INVALIDREQUEST = array(
        "code" => 400,
        "msg" => "Bad request"
    );
    protected static $INVALIDHTTPMETHOD = array(
        "code" => 405,
        "msg" => "Method not allowed"
    );
}

?>