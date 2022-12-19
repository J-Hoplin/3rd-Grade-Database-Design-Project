<?php
/**
 * Codes
 */

define("SUCCESS",true);
define("FAIL",false);

/**
 * HTTP method err msgs
 */
define("OK","OK");
define("ERR_400","Bad request");
define("ERR_405","Method not allowed");
define("ERR_500","Invalid return type. Type should be jsonstring or string");

/**
 * Other err msg
 */
define("ERR_MIDDLEWARE_NOT_CALLABLE","Middleware should be callable object");
define("ERR_MIDDLEWARE_NOT_ARRAY","Middleware should be given as array");
define("ERR_MIDDLEWARE_EXCEPTION", "Exception while executing middle ware");

/**
 * Custom msg
 */

define("FAILTOPROCESS","Fail while processing");
?>