<?php

include_once __DIR__."/../../getprojectpath.php";

/**
 *
 * Define some required constant variables
 * php constants become global constant while script is running
 *
 * CSS_PATH : css files base path
 * SCRIPT_PATH : javascript files base path
 * HOME_PATH : home basic path
 *
 */
# Get Project Root
define('PROJECT_ROOT_PATH',getprojectpath());
// href hyperlink 타입 ->
define('CSS_PATH',PROJECT_ROOT_PATH."/home/assets/css");
define('SCRIPT_PATH',PROJECT_ROOT_PATH."/home/assets/script");
define('PAGES_PATH',PROJECT_ROOT_PATH."/home/pages");
define('HOME_PATH',PROJECT_ROOT_PATH."/home");
define('TEMPLATES_PATH',dirname(__FILE__)."/../templates/");
define('APP_PATH', dirname(__FILE__) . "/../app/");
define('HOST',$_SERVER["HTTP_HOST"]);

// Message
define('INVALID_EMAIL',"Email : Invalid email form");
define('INVALID_USERNAME',"Username : Should be longer than 5 lower than 20 characters & Only upper/lower alphabet and number are available");
define('INVALID_PASSWORD',"Password : Should be longer than 6 and require at least one upper & lower alphabet and number, special symbol");
define('INVALID_PAGINATION',"Invalid pagination counter");

// Pagination config constant
// This is standard of font size 100% in chrome browser
define('PAGINATION',10);
define('PAGINATION_HISTORY',4);
define('PAGINATION_PLAYER_TEAMPAGE',7);

?>