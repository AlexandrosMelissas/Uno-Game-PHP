
<?php
 
require_once "lib/dbconnect2.php";
require_once "lib/show_board.php";
require_once "lib/reset_board.php";
require_once "lib/do_move.php";
require_once "lib/do_paso.php";
require_once "lib/do_draw.php";
require_once "lib/show_card_info.php";
require_once "lib/show_player_info.php";
require_once "lib/show_players.php";
require_once "lib/show_game.php";
require_once "lib/do_uno.php";

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

switch ($r=array_shift($request)) {
    case 'board' : 
                     switch ($b=array_shift($request)) {
                                case '':
                                case null: handle_board($method);
                                                break;
                                case 'card': handle_card($method,$request[0]);
                                                break;
                                case 'player': handle_player($request[0]);
                                                break;
                                case 'players': handle_players();
                                        break;
                                case 'paso': handle_paso();
                                        break;
                                case 'draw': handle_draw();
                                        break;
                                case 'uno': handle_uno();
                                        break;
                                case 'game': handle_game();
                                default: header("HTTP/1.1 404 Not Found");
                                                break;
         }
         break;
    default:  header("HTTP/1.1 404 Not Found");
                        exit;
}

function handle_board($method) {
 
        if($method=='GET') {
               show_board();
        } else if ($method=='POST') {
                reset_board();
        }
}

function handle_card($method,$card) {
        if($method=='PUT'){
            do_move($card);}
        else if($method=='GET'){
            show_card_info($card);
        }

}

function handle_paso(){
        do_paso();
}

function handle_draw(){
        do_draw();
}
 
function handle_player($player) {
   show_player_nickname($player);
}

function handle_players() {
   show_players();
}

function handle_uno(){
        do_uno();
}

function handle_game(){
        show_game();
}
 
?>
