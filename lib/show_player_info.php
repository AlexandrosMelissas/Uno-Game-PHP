<?php
header('Content-type: application/json');
function show_player_nickname($player){
global $mysqli;
$stmt = $mysqli->prepare("SELECT nickname FROM `players` WHERE `player`='{$player}'");
$stmt->execute();
$result = $stmt->get_result();
print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);

}
?>