<?php
require_once 'dbconnect2.php';
header('Content-type: application/json');

function show_board(){
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT card_name,card_value,color,type FROM `cards` WHERE `owner` IS NOT NULL");
    $stmt->execute();
    $result = $stmt->get_result();
    print json_encode($result->fetch_all(MYSQLI_ASSOC),JSON_PRETTY_PRINT);
}
?>