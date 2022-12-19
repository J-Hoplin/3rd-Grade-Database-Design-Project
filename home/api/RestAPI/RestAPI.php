<?php

include_once "httpcode.php";

// Add JSON header for json sending
header("Content-Type: application/json");
class restful_api extends HTTPcodes {

    // Global middleware
    private static $globalmiddleware = array();
    // Local middleware
    protected static $localmiddleware = array();

    private static function commonResult($block,$additionalmsg=""){
        return self::buildResultJSON($block["msg"].$additionalmsg,$block["code"]);
    }

    protected static function buildResultJSON($data="",$statuscode=200){
        http_response_code($statuscode);
        $success = $statuscode >= 400 ? FAIL : SUCCESS;
        return json_encode(array(
            "success" => $success,
            "data" => $data
        ),JSON_UNESCAPED_UNICODE);
    }
    /**
     * Every http method will return invalid request error
     *
     * User must override method in following http method user want
     */

    protected static function GET(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }
    protected static function POST(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }
    protected static function PUT(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    protected static function DELETE(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    protected static function PATCH(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    private static function processing(){
        $httpmethod = strtoupper($_SERVER['REQUEST_METHOD']);
        if(is_callable(array(get_called_class(),$httpmethod))){
            $middlewares = array(
                self::$globalmiddleware,
                get_called_class()::$localmiddleware
            );
            // Process middleware
            foreach ($middlewares as $item) {
                foreach ($item as $key => $value){
                    // If middleware doesn't give as array
                    if(gettype($value) != "array"){
                        return get_called_class()::commonResult(self::$MIDDLEWARESHOULDBEARRAY);
                    }
                    else{
                        // if array is empty, pass
                        if(!count($value)){
                            continue;
                        }else{
                            // Function name
                            $func = $value[0];
                            // Parameters
                            $params = count($value) > 1 ? array_slice($value,1) : array();
                            // Middleware should be callable object
                            if(!is_callable($func)){
                                return get_called_class()::commonResult(self::$MIDDLEWARENOTCALLABLE, " : $value is not callable");
                            }
                            // If callable execute value
                            try{
                                ob_start();
                                $res = call_user_func_array($func,$params);
                                // If result of call_user_func_array unsuccessfully executed -> return false
                                // We can't get error message from it, so use error_get_last to get error message
                                // return value null is also "false" in logically. so firstly check logically about result and check if it's false or null with is_null()
                                // For PHP < 7.1
                                if(!$res and !is_null($res)){
                                    throw new Exception("Exception while executing $func");
                                }
                                ob_end_clean();

                            }catch (Exception $e){ // For PHP <= 5.6
                                return get_called_class()::commonResult(self::$MIDDLEWREEXCEPTIONOCCURED," | msg -> ".$e->getMessage());
                            }catch (Throwable $e){// For PHP >= 7.1
                                return get_called_class()::commonResult(self::$MIDDLEWREEXCEPTIONOCCURED," | msg -> ".$e->getMessage());
                            }
                        }
                    }
                }
            }
            // Process request
            ob_start();
            $res = get_called_class()::$httpmethod();
            ob_end_clean();
            if(gettype($res) == "string"){
                return $res;
            }else{
                return get_called_class()::commonResult(self::$INVALIDRETURNTYPE);
            }
        }else{
            return get_called_class()::commonResult(self::$INVALIDHTTPMETHOD);
        }
    }

    public static function listen(){
        echo get_called_class()::processing();
    }
}

?>