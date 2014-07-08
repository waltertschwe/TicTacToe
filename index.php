<?php
try {
	$connection = new Mongo();
	$db = $connection->tictactoe;
	$collection = $db->games;
} catch (Exception $e) {
    error_log("Mongo connection error " .  $e->getMessage());
}

	$playerVictories = $collection->count(array('winner' => 1));
	$aiVictories     = $collection->count(array('winner' => 2));
	$draws           = $collection->count(array('winner' => 0));


?>
<!doctype html>
<html lang="en">
<head>
<title>Tic Tac Toe</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1><font color="blue">Tic-Tac-Toe</font></h1>
    </div
</div>
<div class="row"></div>
<div class="row">
	<div class="col-xs-6 col-md-4">
		 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span>&nbsp;&nbsp;How To Play</h3>
            </div>
            <div class="panel-body">
                1. Player goes first <br/>
                2. Click on a box and try to make three in a row!<br/><br/>
                <b>*NOTE*</b> This version of Tic-Tac-Toe has been coded so the AI never loses. <br/><br/>If player wins please contact:<br/> 
                <a href="mailto:wschweitzer00@gmail.com">Walter Schweitzer</a> with your winning combination! <br/>
            </div>
          </div>
		
	</div>
	<div class="col-xs-6 col-md-4">
<div id="board" style="width:400px; height:300px; margin:0 auto;">
    <table>
      <tr id="row1">
        <td id="slot1" class="square"></td>
        <td id="slot2" class="square v"></td>
        <td id="slot3" class="square"></td>
      </tr>
      <tr id="row2">
        <td id="slot4" class="square h"></td>
        <td id="slot5" class="square v h"></td>
        <td id="slot6" class="square h"></td>
      </tr>
      <tr id="row3">
        <td id="slot7" class="square"></td>
        <td id="slot8" class="square v"></td>
        <td id="slot9" class="square"></td>
      </tr>
    </table>
  </div>
 </div>
<div class="col-xs-6 col-md-4"><!-- Overall Results Pulled from datasource -->
  <ul class="list-group">
    <li class="list-group-item active">
        <span class="glyphicon glyphicon-stats"></span>&nbsp;Results
    </li>
	<li class="list-group-item">
    	<b>Player Wins = </b>&nbsp;&nbsp;<?php echo $playerVictories; ?></li> 
    <li class="list-group-item">
		<b>AI Wins = </b>&nbsp;&nbsp;<?php echo $aiVictories; ?></li>
	<li class="list-group-item">
		<b>Draws =</b>&nbsp;&nbsp;<?php echo $draws; ?>
	</li>
	<li class="list-group-item">
		<div id="simulate"><a href="">Simulate 500 games</a></div>
	</li>
	</ul>	
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
