<?php
session_start();
if(!isset($_SESSION['id']) or !isset($_SESSION['username'])){
    header("Location: login.php");
}else{
    header("Location: ../../index.php");
}


?>
