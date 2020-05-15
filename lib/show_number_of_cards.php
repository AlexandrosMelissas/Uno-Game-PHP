<?php
session_start();
require 'dbconnect2.php';
if($_SESSION['user']=="player1"){
    $stmt1 = $mysqli->prepare("SELECT COUNT(*) FROM `cards` WHERE `owner`='player2'");
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = mysqli_fetch_array($result);
    echo $row[0];
}
else{
     $stmt1 = $mysqli->prepare("SELECT COUNT(*) FROM `cards` WHERE `owner`='player1'");
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = mysqli_fetch_array($result);
    echo $row[0];
}
?>