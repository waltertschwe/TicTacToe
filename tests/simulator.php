<?php

include('../TicTacToe.php');


$connection = new Mongo();
$db = $connection->tictactoe;
$collection = $db->games;


for($i = 0; $i < 500; $i++) {
$winnerArr = array();
 
$ticTacToe = new TicTacToe;

$freePositions = array(1=>1, 2=> 2, 3=> 3,4 =>4,5=>5,6=>6,7=>7,8=>8,9=>9);

$playerSelections = array();
$aiSelections     = array();
$ticTacToe->initSession();

$winner = 0;

## Turn #1 Player 
$slotSelected = array_rand($freePositions,1);
##$slotSelected = 9;
unset($freePositions[$slotSelected]);
$turn1 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;


## Turn #2 Computer 
$turn2 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn2] = $turn2;
unset($freePositions[$turn2]);

## Turn #3 Player
$slotSelected = array_rand($freePositions,1);
##$slotSelected = 6;
unset($freePositions[$slotSelected]);
$turn3 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;

## Turn #4 Computer
$turn4 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn4] = $turn4;
unset($freePositions[$turn4]);

## Turn #5 Player
$slotSelected = array_rand($freePositions,1);
##$slotSelected = 2;
unset($freePositions[$slotSelected]);
$turn5 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
$isWinner = $_SESSION['playerWinner'];
if($isWinner) {
	$winnerArr = array('winner' => 1, 'description' => 'player');
	$collection->insert($winnerArr);
    continue;
}


## Turn 6 Computer
$turn6 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn6] = $turn6;
unset($freePositions[$turn6]);
$isWinner = $_SESSION['isWinner'];
if($isWinner) {
	$winnerArr = array('winner' => 2, 'description' => 'computer');
	$collection->insert($winnerArr);
    continue;
}

## Turn #7 Player
$slotSelected = array_rand($freePositions,1);
unset($freePositions[$slotSelected]);
$turn7 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
$isWinner = $_SESSION['playerWinner'];
if($isWinner) {
	$winnerArr = array('winner' => 1, 'description' => 'player');
	$collection->insert($winnerArr);
	continue;
}

## Turn 8 Computer
$turn8 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn8] = $turn8;
unset($freePositions[$turn8]);
$isWinner = $_SESSION['isWinner'];
if($isWinner) {
	$winnerArr = array('winner' => 2, 'description' => 'computer');
	$collection->insert($winnerArr);
    continue;
}


## Turn 9 Player
$slotSelected = array_rand($freePositions,1);
unset($freePositions[$slotSelected]);
$turn9 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
$isWinner = $_SESSION['playerWinner'];
if($isWinner) {
	$winnerArr = array('winner' => 1, 'description' => 'player');
	$collection->insert($winnerArr);
	continue;
}

$winnerArr = array('winner' => 0, 'description' => 'draw');
$collection->insert($winnerArr);
continue;
}









