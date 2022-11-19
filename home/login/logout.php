<?php

include_once __DIR__."/../common/common.php";

BlockHTTPAccess::filter();

session_start();
// Destroy session id and session variables
session_destroy();

header("Location: ".HOME_PATH);
?>