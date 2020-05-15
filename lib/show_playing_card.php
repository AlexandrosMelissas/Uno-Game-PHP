<?php
require "dbconnect2.php";
header('Content-type: application/json');
//emfanizei thn paizomenh karta
$stmt = $mysqli->prepare('SELECT card_name,color FROM `cards` WHERE owner="PlayingCard"');
$stmt->execute();
$result = $stmt->get_result();
$json = print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
?>