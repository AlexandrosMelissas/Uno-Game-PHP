<?php
session_start();
require_once "dbconnect2.php";
$nickname = $_SESSION['nickname'];

$stmt1 = $mysqli->prepare("SELECT `game_status` FROM `game`");
$stmt1->execute();
$result = $stmt1->get_result();
$row = mysqli_fetch_array($result);
$game_status = $row[0];

if($game_status=="started"){
$stmt = $mysqli->prepare("SELECT has_turn FROM `game`");
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
$has_turn = $row[0];

if ($nickname == $has_turn) {
    echo '<h3>Πέτα μία κάρτα (π.χ. G0) : </h3>
   <input id="move"/>
   <button id="do_move" class="btn btn-primary mt-1 d-inline-block">ΠΕΤΑ ΤΗΝ ΚΑΡΤΑ</button>
   <button id="draw" class="btn btn-warning mt-1 d-inline-block">ΤΡΑΒΗΞΕ ΜΙΑ ΚΑΡΤΑ</button>
   <button id="paso" class="btn btn-danger mt-1 d-inline-block">ΠΑΣΟ</button>
   <button id="uno" class="btn btn-success mt-1 d-inline-block">UNO</button>'
    ;
}}
