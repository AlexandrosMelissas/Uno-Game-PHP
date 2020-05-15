<?php 
session_start();
require_once "dbconnect2.php";
header('Content-type: application/json');
//dialegoyme tis kartes poy antistixoun ston paixti (session user) gia na tis deiksoume
$stmt1 = $mysqli->prepare("SELECT `game_status` FROM `game`");
$stmt1->execute();
$result = $stmt1->get_result();
$row = mysqli_fetch_array($result);
$game_status = $row[0];

if($game_status=="started"){

$stmt2 = $mysqli->prepare("SELECT card_name,color from `cards` WHERE `owner`='{$_SESSION['user']}'" );
$stmt2->execute();
$result = $stmt2->get_result();
$json = print json_encode($result->fetch_all(MYSQLI_ASSOC),JSON_PRETTY_PRINT);
}
?>