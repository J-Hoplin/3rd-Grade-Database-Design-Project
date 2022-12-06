<?php
include_once "team.php";

$t = new Team();

var_dump($t->getteamlist_pagination(1)[0]);