<?php

include_once __DIR__."/../../getprojectpath.php";

/**
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
define('DATABASE_PATH', dirname(__FILE__) . "/../app/");

// Message
define('INVALID_EMAIL',"Invalid email form");
define('INVALID_USERNAME',"Invalid username.\n- Should be longer than 8 lower than 20 characters \n- Only upper/lower alphabet and number are available");
define('INVALID_PASSWORD',"");

// project config
define('PAGINATION',10);

?>