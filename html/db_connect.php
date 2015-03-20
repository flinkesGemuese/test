<?php

include_once 'db_settings.php';
$db = new mysqli(HOST, USER, PASSWORD, DATABASE);
$db->query("SET NAMES 'utf8'");
?>