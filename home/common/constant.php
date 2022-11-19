<?php

/**
 * Define some required constant variables
 * php constants become global constant while script is running
 *
 * CSS_PATH : css files base path
 * SCRIPT_PATH : javascript files base path
 * HOME_PATH : home basic path
 *
 */

define('CSS_PATH',"/home/assets/css");
define('SCRIPT_PATH',"/home/assets/script");
define('PAGES_PATH',"/home/pages");
define('HOME_PATH',"/home");
define('TEMPLATES_PATH',$_SERVER['DOCUMENT_ROOT']."/home/templates");

?>