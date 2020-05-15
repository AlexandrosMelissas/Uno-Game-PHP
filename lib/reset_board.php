<?php
require_once 'dbconnect2.php';
session_start();
header('Content-type: application/json');
function reset_board(){
global $mysqli;

$stmt = $mysqli->prepare('SELECT game_status FROM `game`');
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
$game_status = $row[0];

if($game_status=="initialized" || $game_status=="started"){
$stmt = $mysqli->prepare('REPLACE into `cards` select * from `cards_empty`');
$stmt->execute();

$stmt1 = $mysqli->prepare('UPDATE `cards` SET `owner`="player1" WHERE `owner` IS NULL ORDER BY RAND() LIMIT 7');
$stmt1->execute();

$stmt2 = $mysqli->prepare('UPDATE `cards` SET `owner`="player2" WHERE `owner` IS NULL ORDER BY RAND() LIMIT 7');
$stmt2->execute();

$stmt3 = $mysqli->prepare('UPDATE `cards` SET `owner`="PlayingCard" WHERE `owner` IS NULL AND `type`<>"special" ORDER BY RAND() LIMIT 1');
$stmt3->execute();

$nickname = $_SESSION['nickname'];

$_SESSION['uno']='false';

$stmt4 = $mysqli->prepare("UPDATE `game` SET `game_status` ='started',`has_turn`='{$nickname}'");
$stmt4->execute();

$user = $_SESSION['user'];
$stmt5 = $mysqli->prepare("SELECT card_name,color from `cards` WHERE `owner`='{$_SESSION['user']}'" );
$stmt5->execute();
$result = $stmt4->get_result();
print json_encode($result->fetch_all(MYSQLI_ASSOC),JSON_PRETTY_PRINT);
}
else{
    print json_encode("failed");
}
}
?>