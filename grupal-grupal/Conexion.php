<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "12345";
$database = "tasks";

$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $database);

if ($mysqli->connect_error) {
    $mysqli->close();
    die("Connection failed: " . $mysqli->connect_error);
    exit();
}
