<?php 
header('Content-type: application/json');
function do_uno(){
global $mysqli;
$user = $_SESSION['user'];

$stmt = $mysqli->prepare("SELECT * FROM `cards` WHERE `owner`='$user'");
$stmt->execute();
$result = $stmt->get_result();

if($_SESSION['uno']=='true'){
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-type: application/json');
    print json_encode(['error'=>'Έχεις ήδη πει Uno!']);
    }else if(mysqli_num_rows($result)==2 && $_SESSION['uno']=='false'){
    $_SESSION['uno']="true";
    print json_encode("uno_true");
}else{
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-type: application/json');
    print json_encode(['error'=>'Πρέπει να έχεις 2 κάρτες στο χέρι για να πεις Uno!']);
}





}