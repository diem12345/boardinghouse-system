<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'bhwebsites';

$mysqli = new mysqli($hname, $uname, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
