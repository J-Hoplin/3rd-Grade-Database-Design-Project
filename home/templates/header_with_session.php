<?php

/**
 *
 * header with session
 *
 */

include_once "header.php";

// Start session
session_start();

if(!isset($_SESSION['username']) or !isset($_SESSION['userid'])){
    echo "<script>
alert(\"로그인이 필요합니다!\");
</script>";
    header("Location: ".HOME_PATH."/login/login.php");
    exit();
}

$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

?>