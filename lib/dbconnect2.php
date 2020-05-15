<?php
require_once "db_upass.php";
$host='localhost';
$db = 'uno';
$user=$DB_USER;
$pass=$DB_PASS;
global $mysqli;
$mysqli = new mysqli($host, $user, $pass, $db);    
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . 
    $mysqli->connect_errno . ") " . $mysqli->connect_error;
}?>
