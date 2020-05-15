<?php
require_once "dbconnect2.php";

$stmt0 = $mysqli->prepare("SELECT `game_status` FROM `game`");
$stmt0->execute();
$result = $stmt0->get_result();
$row = mysqli_fetch_array($result);

if($row[0]=="started"){
$stmt = $mysqli->prepare("SELECT `has_turn` FROM `game`");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
echo "<h3>Είναι η σειρά του <b>".$row[0]."</b>";
}
?>