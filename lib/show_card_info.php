<?php
header('Content-type: application/json');
function show_card_info($card){
global $mysqli;
$stmt = $mysqli->prepare("SELECT card_name,card_value,color,type FROM `cards` WHERE `card_name`='$card' LIMIT 1");
$stmt->execute();
$result = $stmt->get_result();
$json = print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}
?>