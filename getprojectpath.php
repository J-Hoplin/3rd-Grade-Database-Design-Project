<?php

function getprojectpath(){
    # Get apacher server root directory
    $serveroot = $_SERVER['DOCUMENT_ROOT'];
    # Get project's root directory
    $filerealpath = dirname(__FILE__);
    # Split project's path via '/' and make project path with slicing with length of server root directory count
    $res = join("/",array_slice(explode("/",$filerealpath),count(explode("/",$serveroot))));
    return !strlen($res) ? "" : "/".$res;
}

?>
