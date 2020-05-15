<?php
require_once 'dbconnect2.php';
header('Content-type: application/json');
function do_move($card)
{
    global $mysqli;
    $user = $_SESSION['user'];
    $oppnickname = $_SESSION['oppnickname'];

    $stmt0 = $mysqli->prepare("SELECT card_value,color FROM `cards` WHERE `owner`='PlayingCard'");
    $stmt0->execute();
    $result = $stmt0->get_result();
    $row = mysqli_fetch_array($result);
    $playing_card_value = $row["card_value"];
    $playing_card_color = $row["color"];

    $stmt1 = $mysqli->prepare("SELECT card_value,color FROM `cards` WHERE `card_name`='$card' AND `owner`='$user'");
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row = mysqli_fetch_array($result1);
    $player_card_value = $row["card_value"];
    $player_card_color = $row["color"];

    
    $stmt2 = $mysqli->prepare("SELECT card_value FROM `cards` WHERE card_value='Wild' AND `owner`='$user'");
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    

    $stmt3 = $mysqli->prepare("SELECT card_value FROM `cards` WHERE card_value='Draw Four' AND `owner`='$user'");
    $stmt3->execute();
    $result3 = $stmt3->get_result();


function success($mysqli,$user){
    if(!isset($_SESSION['uno'])){
        $_SESSION['uno']='false';
    }

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM `cards` WHERE `owner`='$user'");
    $stmt->execute();
    $result = $stmt->get_result();
    $row_kartes = mysqli_fetch_array($result);

    if($row_kartes[0]>1){
        $_SESSION['uno']="false";
    }

    if($row_kartes[0]==0 && $_SESSION['uno']=='true'){
      print json_encode("win");
    $stmt1 = $mysqli->prepare("UPDATE `game` SET `game_status`='initialized'");
    $stmt1->execute();
    }else if($row_kartes[0]==0 && $_SESSION['uno']=='false'){
        $stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='$user' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 2");
        $stmt->execute();

         header("HTTP/1.1 500 Internal Server Error");
         header('Content-type: application/json');
         print json_encode(['error'=>'Που το έχεις το μυαλό σου;Ξέχασες να πεις Uno!Πάρε 2 κάρτες!']);
    }

}
function failed($message){
     header("HTTP/1.1 500 Internal Server Error");
     header('Content-type: application/json');
     print json_encode(['error'=>$message]);
}

function draw_two($mysqli,$card,$user,$oppnickname){
    $stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='burnt' WHERE `owner`='PlayingCard'");
    $stmt->execute();

    $stmt1 = $mysqli->prepare("UPDATE `cards` SET `owner`='PlayingCard' WHERE `card_name`='$card' AND `owner`='$user' LIMIT 1");
    $stmt1->execute();

    if($user=="player1"){

    $stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`='player2' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 2");
    $stmt2->execute();
    }else{
    $stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`='player1' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 2");
    $stmt2->execute();
    }
    $stmt3 = $mysqli->prepare("UPDATE `game` SET `has_turn`='{$oppnickname}'");
    $stmt3->execute();
    $_SESSION["drawn"]="false";
   success($mysqli,$user);
}

function number($mysqli,$card,$user,$oppnickname){
    $stmt3 = $mysqli->prepare("UPDATE `cards` SET `owner`='burnt' WHERE `owner`='PlayingCard'");
    $stmt3->execute();

    $stmt4 = $mysqli->prepare("UPDATE `cards` SET `owner`='PlayingCard' WHERE `card_name`='$card' AND `owner`='$user' LIMIT 1");
    $stmt4->execute();

    $stmt5 = $mysqli->prepare("UPDATE `game` SET `has_turn`='$oppnickname'");
    $stmt5->execute();

    $_SESSION["drawn"]="false";
    success($mysqli,$user);
}

function skip_reverse($mysqli,$card,$user){
    $stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='burnt' WHERE `owner`='PlayingCard'");
    $stmt->execute();
    $stmt1 = $mysqli->prepare("UPDATE `cards` SET `owner`='PlayingCard' WHERE `card_name`='$card' AND `owner`='$user'  LIMIT 1");
    $stmt1->execute();
    success($mysqli,$user);
}

function draw_four($result3,$mysqli,$user,$oppnickname,$card_name,$color){
    if(mysqli_num_rows($result3)>0){
        $stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='burnt' WHERE `owner`='PlayingCard'");
        $stmt->execute();
        $stmt1 = $mysqli->prepare("UPDATE `cards` SET `owner`='PlayingCard',`card_name`='{$card_name}',`color`='{$color}' WHERE `card_name`='W+4' AND `owner`='$user' LIMIT 1");
        $stmt1->execute();

        if($user=="player1"){
            $stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`='player2' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 4");
            $stmt2->execute();
            }else{
            $stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`='player1' WHERE `owner` IS NULL ORDER BY RAND() LIMIT 4");
            $stmt2->execute();
        }

        $stmt5 = $mysqli->prepare("UPDATE `game` SET `has_turn`='$oppnickname'");
        $stmt5->execute();
        $_SESSION["drawn"]="false";  
        success($mysqli,$user);
    }else{
        failed("Δεν έχετε την κάρτα W+4!");
    }}
function wild($result2,$mysqli,$user,$oppnickname,$card_name,$color){
    if(mysqli_num_rows($result2)>0){
        $stmt = $mysqli->prepare("UPDATE `cards` SET `owner`='burnt' WHERE `owner`='PlayingCard'");
        $stmt->execute();
        $stmt1 = $mysqli->prepare("UPDATE `cards` SET `owner`='PlayingCard',`card_name`='$card_name',`color`='$color' WHERE `card_name`='W' AND `owner`='$user' LIMIT 1");
        $stmt1->execute();

        $stmt5 = $mysqli->prepare("UPDATE `game` SET `has_turn`='$oppnickname'");
        $stmt5->execute();
        $_SESSION["drawn"]="false";
        success($mysqli,$user); 
    }else{
        failed("Δεν έχετε την κάρτα W!");
    }

}


if ($player_card_color == $playing_card_color || $player_card_value == $playing_card_value) {
  switch($player_card_value){
    case "Draw Two": draw_two($mysqli,$card,$user,$oppnickname);
             break;
    case "Skip": skip_reverse($mysqli,$card,$user);
             break;
    case "Reverse": skip_reverse($mysqli,$card,$user);
             break;
    default: number($mysqli,$card,$user,$oppnickname);
    }
    }else{
    switch($card){
        case "BW+4":
            draw_four($result3,$mysqli,$user,$oppnickname,"BW+4","blue");
        break;
        case "RW+4":
            draw_four($result3,$mysqli,$user,$oppnickname,"RW+4","red");
        break;
        case "GW+4":
            draw_four($result3,$mysqli,$user,$oppnickname,"GW+4","green");
        break;
        case "YW+4":
            draw_four($result3,$mysqli,$user,$oppnickname,"YW+4","yellow");
        break;
        case "BW":
            wild($result2,$mysqli,$user,$oppnickname,"BW","blue");
        break;
        case "RW":
            wild($result2,$mysqli,$user,$oppnickname,"RW","red");
        break;
        case "GW":
            wild($result2,$mysqli,$user,$oppnickname,"GW","green");
        break;
        case "YW":
            wild($result2,$mysqli,$user,$oppnickname,"YW","yellow");
        break;
        default: failed("Μη συμβατή κίνηση!Δείτε τις διαθέσιμες κινήσεις στους κανόνες!");
   }}
       
}
?>