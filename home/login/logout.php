<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/common/constant.php";
session_start();
// Destroy session id and session variables
session_destroy();

header("Location: ".HOME_PATH);
?>