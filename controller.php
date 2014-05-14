<?php
include('TicTacToe.php');

$response = array();
$slotSelected = (int)$_GET['slot'];

try {
	$connection = new Mongo();
	$db = $connection->tictactoe;
	$collection = $db->games;
} catch (Exception $e) {
    error_log("Mongo connection error " .  $e->getMessage());
}


$ticTacToe = new TicTacToe;

## INIT SESSION
session_start();  
if(empty($_SESSION)) {
	//error_log("INITIALIZING SESSION", 0);
	$ticTacToe->initSession();
} 

## player selected slot check if player won

$playerSelection = $ticTacToe->playerSelection($slotSelected);
$playerWinner = $_SESSION['isPlayerWinner'];
if($playerWinner){
	$winnerArr = array('winner' => 1, 'description' => 'player');
	$collection->insert($winnerArr);
	$response['playerWinner'] = 1;
	echo json_encode($response);
	session_destroy();
	exit();
} else {
	$response['playerWinner'] = 0;
}
	


## ai generated slot check if ai won
$aiSelection = $ticTacToe->aiSelection($slotSelected);
$aiWinner = $_SESSION['isWinner'];
unset($_SESSION['free'][$aiSelection]);
if($aiWinner) {
	$response['aiSelection'] = $aiSelection;
	$winnerArr = array('winner' => 2, 'description' => 'computer');
	$collection->insert($winnerArr);
	$response['aiWinner'] = 1;
	session_destroy();
	echo json_encode($response);
	exit();
} else {
	$response['aiWinner'] = 0;
}

## check for a draw
$freeSlots = $_SESSION['free'];
if(count($freeSlots) == 0) {
	$winnerArr = array('winner' => 0, 'description' => 'draw');
	$collection->insert($winnerArr);
	$response['isDraw'] = 1;
	session_destroy();
} else {
	$response['isDraw'] = 0;
}

$response['aiSelection'] = $aiSelection;
echo json_encode($response);












