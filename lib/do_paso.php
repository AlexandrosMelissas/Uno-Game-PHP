<?php
header('Content-type: application/json');
function do_paso(){
global $mysqli;
$oppnickname = $_SESSION['oppnickname'];
if(!isset($_SESSION['drawn'])){
    $_SESSION['drawn']="false";
}
if($_SESSION['drawn']=="true"){
$state = $mysqli->prepare("UPDATE `game` SET `has_turn`='{$oppnickname}'");
$state->execute();
$_SESSION["drawn"]="false";}else{
  header("HTTP/1.1 500 Internal Server Error");
  header('Content-type: application/json');
  print json_encode(['error'=>'Μην βιάζεσαι!Τράβηξε μία κάρτα πρώτα!']);
}
}
?>