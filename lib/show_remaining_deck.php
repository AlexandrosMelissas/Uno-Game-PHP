<?php 
require "dbconnect2.php";
//emfanizei tis enapomeinantes kartes
$stmt = $mysqli->prepare("SELECT COUNT(*) from `cards` WHERE `owner` is null");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
echo $row[0];
?>