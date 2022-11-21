<?php

include_once "../../common/common.php";

session_start();
// Destroy session id and session variables
session_destroy();

header("Location: ".HOME_PATH);
?>