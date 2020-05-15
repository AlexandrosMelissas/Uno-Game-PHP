<?php 
 header('Content-type: application/json');
function do_draw(){
global $mysqli;
if(!isset($_SESSION['drawn'])){
    $_SESSION['drawn']="false";
}
if($_SESSION['drawn']=="false"){
$stmt1 = $mysqli->prepare("SELECT COUNT(*) from `cards` WHERE `owner` is null");
$stmt1->execute();
$result = $stmt1->get_result();
$row_owner = mysqli_fetch_array($result);

if($row_owner[0]==0){
    $stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`=null WHERE `owner`='burnt'");
    $stmt2->execute();
} 
$user = $_SESSION['user'];
$stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='{$user}' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 1");
$stmt->execute();
$_SESSION['drawn']="true";

$stmt = $mysqli->prepare("SELECT COUNT(*) FROM `cards` WHERE `owner`='$user'");
$stmt->execute();
$result = $stmt->get_result();
$row_kartes = mysqli_fetch_array($result);

if($row_kartes[0]>1){
    $_SESSION['uno']="false";
}
print json_encode('drawn');
}else{
  header("HTTP/1.1 500 Internal Server Error");
  header('Content-type: application/json');
  print json_encode(['error'=>'Επππ!Σε τσάκωσα!Έχεις τραβήξει ήδη 1 κάρτα!']);
}
}
?>