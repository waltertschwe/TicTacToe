<?php

include('../TicTacToe.php');
/*
echo "board<br/>";
echo "X|0|X<br/>";
echo "----<br/>";
echo "4|5|0<br/>";
echo "----<br/>";
echo "7|8|0<br/><br/>";
 * 
 * -testing for player win.
 */


 
 
 
$ticTacToe = new TicTacToe;

$freePositions = array(1=>1, 2=> 2, 3=> 3,4 =>4,5=>5,6=>6,7=>7,8=>8,9=>9);

$playerSelections = array();
$aiSelections     = array();
$ticTacToe->initSession();

$winner = 0;

## Turn #1 Player 
##$slotSelected = array_rand($freePositions,1);
$slotSelected = 9;
unset($freePositions[$slotSelected]);
$turn1 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
echo "<b>turn 1 (player) = </b>" . $turn1 . "<br/>";


## Turn #2 Computer 
$turn2 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn2] = $turn2;
unset($freePositions[$turn2]);
echo "turn2 (computer) = " . $turn2 . "<br/>";

## Turn #3 Player
##$slotSelected = array_rand($freePositions,1);
$slotSelected = 6;
unset($freePositions[$slotSelected]);
$turn3 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
echo "turn3 (player) = " . $turn3 . "<br/>";

## Turn #4 Computer
$turn4 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn4] = $turn4;
unset($freePositions[$turn4]);
echo "turn4 (computer) = " . $turn4 . "<br/>";

## Turn #5 Player
##$slotSelected = array_rand($freePositions,1);
$slotSelected = 3;
unset($freePositions[$slotSelected]);
$turn5 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
echo "turn5 (player) = " . $turn5 . "<br/>";
$isWinner = $_SESSION['isPlayerWinner'];
if($isWinner) {
	echo "Player Wins";
    drawBoard($playerSelections, $aiSelections); 
    exit();
}


## Turn 6 Computer
$turn6 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn6] = $turn6;
unset($freePositions[$turn6]);
echo "turn6 (computer) = " . $turn6 . "<br/>";
$isWinner = $_SESSION['isWinner'];
if($isWinner) {
	echo "aiWins";
    drawBoard($playerSelections, $aiSelections); 
    exit();
}

## Turn #7 Player
$slotSelected = array_rand($freePositions,1);
unset($freePositions[$slotSelected]);
$turn7 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
echo "turn7 (player) = " . $turn7. "<br/>";
$isWinner = $_SESSION['isPlayerWinner'];
if($isWinner) {
	echo "Player Wins";
    drawBoard($playerSelections, $aiSelections); 
    exit();
}


## Turn 8 Computer
$turn8 = $ticTacToe->aiSelection($slotSelected);
$aiSelections[$turn8] = $turn8;
unset($freePositions[$turn8]);
echo "turn8 (computer) = " . $turn8 . "<br/>";
$isWinner = $_SESSION['isWinner'];
if($isWinner) {
	echo "aiWins";
    drawBoard($playerSelections, $aiSelections); 
    exit();
}


## Turn 9 Player
$slotSelected = array_rand($freePositions,1);
unset($freePositions[$slotSelected]);
$turn9 = $ticTacToe->playerSelection($slotSelected);
$playerSelections[$slotSelected] = $slotSelected;
echo "turn9 (player) = " . $turn9. "<br/>";
$isWinner = $_SESSION['isPlayerWinner'];
if($isWinner) {
	echo "Player Wins";
    drawBoard($playerSelections, $aiSelections); 
    exit();
}

echo "the game is a draw";


drawBoard($playerSelections, $aiSelections);


function drawBoard($playerSelections, $aiSelections) {
	if(in_array(1, $playerSelections)) { $marker1 = "X";} elseif (in_array(1, $aiSelections)) { $marker1 = "O";} else { $marker1 = "1";}
	if(in_array(2, $playerSelections)) { $marker2 = "X";} elseif (in_array(2, $aiSelections)) { $marker2 = "O";} else { $marker2 = "2";}
	if(in_array(3, $playerSelections)) { $marker3 = "X";} elseif (in_array(3, $aiSelections)) { $marker3 = "O";} else { $marker3 = "3";}
	if(in_array(4, $playerSelections)) { $marker4 = "X";} elseif (in_array(4, $aiSelections)) { $marker4 = "O";} else { $marker4 = "4";}
	if(in_array(5, $playerSelections)) { $marker5 = "X";} elseif (in_array(5, $aiSelections)) { $marker5 = "O";} else { $marker5 = "5";}
	if(in_array(6, $playerSelections)) { $marker6 = "X";} elseif (in_array(6, $aiSelections)) { $marker6 = "O";} else { $marker6 = "6";}
	if(in_array(7, $playerSelections)) { $marker7 = "X";} elseif (in_array(7, $aiSelections)) { $marker7 = "O";} else { $marker7 = "7";}
	if(in_array(8, $playerSelections)) { $marker8 = "X";} elseif (in_array(8, $aiSelections)) { $marker8 = "O";} else { $marker8 = "8";}
	if(in_array(9, $playerSelections)) { $marker9 = "X";} elseif (in_array(9, $aiSelections)) { $marker9 = "O";} else { $marker9 = "9";}
	
	
	echo "<br/>";
	
	echo "<b>Board</b><br/>";
	echo $marker1."|".$marker2."|".$marker3."<br/>";
	echo "-----<br/>";
	echo $marker4."|".$marker5."|".$marker6."<br/>";
	echo "-----<br/>";
	echo $marker7."|".$marker8."|".$marker9."<br/><br/>";

}






