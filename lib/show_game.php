<?php
header('Content-type: application/json');
function show_game(){
global $mysqli;
$stmt = $mysqli->prepare("SELECT * FROM `game`");
$stmt->execute();
$result = $stmt->get_result();
print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}
?>