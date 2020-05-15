
<?php
require "lib/dbconnect2.php";
		//pairnoyme to nickname me get
		$nickname = $_GET['nickname'];

		//bgazoyme ta backslashes
		$nickname = stripcslashes($nickname);

		//an h vash sto players einai kenh tote sundesou san player1
		$stmt1 = $mysqli->prepare('SELECT * from `players`');
		$stmt1->execute();
		$result = $stmt1->get_result();

		if(mysqli_num_rows($result)==0){
		//syndesh sth vash
		$_SESSION['user'] = "player1";
		$_SESSION['nickname'] = $nickname;

		$stmt0 = $mysqli->prepare("DELETE FROM `players`");
		$stmt0->execute();

		$stmt1 = $mysqli->prepare("UPDATE `cards` SET `owner`=null");
		$stmt1->execute();

		$stmt1 = $mysqli->prepare("UPDATE `game` SET `game_status`=null,`has_turn`=null");
		$stmt1->execute();

		$stmt = $mysqli->prepare("INSERT INTO `players` (`player`,`nickname`) VALUES ('{$_SESSION['user']}','{$_SESSION['nickname']}')");
		$stmt->execute();
		 header("Location: index.php");
		//alliws syndesou san player2
		} else{
		$_SESSION['user'] = "player2";
		$_SESSION['nickname'] = $nickname;
        //se periptwsh poy den uparxei o player1 gine o player1 kai syndesoy
		$stmt3 = $mysqli->prepare("SELECT * FROM `players` WHERE `player`='player1'");
		$stmt3->execute();
		$result = $stmt3->get_result();
		if(mysqli_num_rows($result)==0){
            $_SESSION['user']="player1";
		}

		$stmt0 = $mysqli->prepare("SELECT * FROM `players`");
		$stmt0->execute();
		$result = $stmt0->get_result();
		//an uparxei hdh o player1 kai player2 sth vash,svhstous kai sundesou san player1
		if(mysqli_num_rows($result)>=2){
		$stmt1 = $mysqli->prepare("DELETE FROM `players`");
		$stmt1->execute();

		$stmt2 = $mysqli->prepare("UPDATE `cards` SET `owner`=null");
		$stmt2->execute();

		$stmt3 = $mysqli->prepare("UPDATE `game` SET `game_status`=null,`has_turn`=null");
		$stmt3->execute();

		$_SESSION['user'] = "player1";
		}

        if ($_SESSION['user']=="player2"){
		$stmt4 = $mysqli->prepare("UPDATE `game` SET `game_status`='initialized',`has_turn`=null");
		$stmt4->execute();
		}
		$stmt = $mysqli->prepare("INSERT INTO `players` (`player`,`nickname`) VALUES ('{$_SESSION['user']}','{$_SESSION['nickname']}')");
		$stmt->execute();
		 header("Location: index.php");
		}
?>

