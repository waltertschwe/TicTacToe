<?php

##
## To Execute Test Suite:
##  phpunit --bootstrap TicTacToe.php unit-tests/TicTacToeTest.php

class TicTacToeTest extends PHPUnit_Framework_TestCase {
	
	public static function setUpBeforeClass() {
		@session_start();
	}
	
	public function testPlayerFirstMoveNotCenter() {
		$t = new TicTacToe();
		$t->initSession();
		$playerSelections = array(1=>1, 2=> 2, 3=> 3,4=>4,6=>6,7=>7,8=>8,9=>9);
		foreach($playerSelections as $playerSelection) {
			$_SESSION['player'] = $playerSelection;
		    $aiSelection = $t->aiSelection($playerSelection);
			$this->assertEquals(5,$aiSelection);
			unset($_SESSION['player']);
		}
	}
	
	public function testPlayerFirstMoveCenter() {
		$t = new TicTacToe();
		$t->initSession();
		$playerSelection = 5;
		$_SESSION['player'] = $playerSelection;
		$aiSelection = $t->aiSelection($playerSelection);
		$this->assertNotEquals($playerSelection, $aiSelection);
		unset($_SESSION['player']);
	}
	
	public function testCheckForWinSlotOne() {
		$t = new TicTacToe();
		$t->initSession();
		$_SESSION['free']   = array(1=>1);
		$_SESSION['ai'] = array(2=>2,3=>3);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(1, $aiSelection);
		
		$_SESSION['ai'] = array(5=>5,9=>9);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(1, $aiSelection);
		
		$_SESSION['ai'] = array(4=>4,7=>7);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(1, $aiSelection);
		
		$_SESSION['ai'] = array(5=>5,7=>7);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(0, $aiSelection);
		
		unset($_SESSION['ai']);
		
	}
	
	public function testCheckForWinSlotTwo() {
		$t = new TicTacToe();
		$t->initSession();
		$_SESSION['free']   = array(2=>2);
		$_SESSION['ai'] = array(5=>5,8=>8);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(2, $aiSelection);
		
		$_SESSION['ai'] = array(1=>1,3=>3);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(2, $aiSelection);
		
		$_SESSION['ai'] = array(5=>5,7=>7);
		$aiSelection = $t->checkForWin();
		$this->assertEquals(0, $aiSelection);
		
	}
		
}
