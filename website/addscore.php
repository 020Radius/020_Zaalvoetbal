<?php

require 'config/connect.php';
session_start();
if(!isset($_SESSION['user']))
	{
	header("location: ./login.php");
	die();
	}

require 'functions.php';


function nowPlaying($mysqli) {
	$id = stripslashes($_GET['id']);

	$sql = "SELECT * FROM poulewedstrijden WHERE wedstrijdnr = '$id'";
	$query = $mysqli->query($sql);
	
	
	if ( !mysqli_num_rows($query) == 1 ) {
		echo 'Kan de geselecteerde wedstrijd niet vinden...';
	}

	$row = mysqli_fetch_assoc($query);

	mysqli_free_result($query);
	return $row['slot_1'] . ' VS ' . $row['slot_2'];	
}

function getPlayers($mysqli) {
	$id = stripslashes($_GET['id']);

	$sql = "SELECT spelers.id, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, teams.naam FROM spelers INNER JOIN teams ON spelers.team_id = teams.id WHERE poulewedstrijden.id = '$id'";
	$query = $mysqli->query($sql);
		
	
	if ( !mysqli_num_rows($query) ) {
		echo 'Geen spelers gevonden';
	}

	while($row = mysqli_fetch_assoc($query) ) {
		echo $row['spelers.voornaam'];
	}

	mysqli_free_result($query);
	
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
    <style>
		.labelMedium {
			font-size: 2.5em;
		}

		.labelBig {
			font-size: 4em;
			width: 300px;
			vertical-align: top;
		}

		.inputBig {
			box-sizing: border-box;
			height: 100px;
			width: 100px;
			font-size: 4em;
			text-align: center;
			border: 3px solid white;
			box-shadow: inset 0 0 8px rgba(0,0,0,0.1), 0 0 16px rgba(0,0,0,0.1);						
			background: rgba(255,255,255,0.8);
		}
		


    </style>
</head>
<body>
<div class="container">
	<div class="page-header">
		<h1>Score toevoegen</h1>
		<h2 class="text-center"> <?php echo nowPlaying($mysqli); ?> </h2>
		<a href="selectwedstrijd.php"><button class="btn btn-default">Wedstrijd selecteren</button></a>
	</div>
	

	<?php 
		$id = stripslashes($_GET['id']);
		$sql2 = "SELECT * FROM poulewedstrijden WHERE wedstrijdnr = '$id'";
		$query = $mysqli->query($sql2);
		$row = mysqli_fetch_assoc($query);
	?>
	<div class="score col-md-8">
	    <form role="form" action="__addScore.php?id=<?php echo $id?>" METHOD="POST">
			<legend>Eindscore</legend>
			<div class="form-group">
		        <label class="labelBig" for="score1"  id="score1"><?php echo $row['slot_1']; ?></label>
		    	<input type="number" name="score1" id="score1" value="<?php echo $row['goals_slot_1']; ?>" class="inputBig">
			</div>
			
			<div class="form-group">
		    	<label class="labelBig" for="score2" id="score2" name="score2"><?php echo $row['slot_2']; ?></label>
		    	<input type="number" name="score2" id="score2" value="<?php echo $row['goals_slot_2']; ?>" class="inputBig">
			</div>
			
			
			<div class="form-group">
		    	<label class="labelMedium" for="score" id="score">Wie heeft er gescoord?</label>
				
				<h3> <?php echo $row["slot_1"] ?> </h3>
				<?php
				
				
				$sql2 = $mysqli->query("SELECT * FROM teams WHERE naam = '".$row["slot_1"]."'");
				$row2 = mysqli_fetch_object($sql2);
				$sql3 = $mysqli->query("SELECT * FROM spelers WHERE team_id = '".$row2->id."'");
				while($row3 = mysqli_fetch_assoc($sql3))
				{
				 echo $row3['voornaam'] ?><input class="inputMedium" type="radio" name="punt" id="score" value="<?php echo $row3['id'] ?> "><br>
				<?php
				}
				?>
					
				
				<h3> <?php echo $row["slot_2"] ?> </h3>
				<?php
				
				$sql4 = $mysqli->query("SELECT * FROM teams WHERE naam = '".$row["slot_2"]."'");
				$row4 = mysqli_fetch_object($sql4);
				$sql5 = $mysqli->query("SELECT * FROM spelers WHERE team_id = '".$row4->id."'");
				while($row5 = mysqli_fetch_assoc($sql5))
				{
				 echo $row5['voornaam'] ?><input class="inputMedium" type="radio" name="punt" id="score" value="<?php echo $row5['id'] ?> "><br>
				<?php
				}
				?>
				
				
<br>
Niemand <input class="inputMedium" type="radio" name="punt" id="score" value="niemand">
			
			</div>
			
			
			<input type="submit" name="update" value="update score">
				<br>	<br>
				
				
			<div class="form-group">
		    	<label class="labelMedium" for="winnaar" id="winnaar">winnaar</label>
				<?php
				if($row['goals_slot_2'] > $row['goals_slot_1'])
				{
				?>
				<?php echo $row['slot_1'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_1'] ?> ">
				<?php echo $row['slot_2'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_2'] ?> "checked>
				<?php
				}
				elseif($row['goals_slot_2'] < $row['goals_slot_1'])
				{
				?>
				<?php echo $row['slot_1'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_1'] ?> "checked>
				<?php echo $row['slot_2'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_2'] ?> ">
				<?php
				}
				else
				{
				
				?>
				<?php echo $row['slot_1'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_1'] ?> ">
				<?php echo $row['slot_2'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_2'] ?> ">
				<?php
				
				}
?>
			
			</div>
			<br>
			<div class="form-group">
		    	<label class="labelMedium" for="gelijk" id="gelijk">gelijkspel?</label>
				<?php
				if($row['goals_slot_2'] == $row['goals_slot_1'])
				{
				?>
		    	<input type="checkbox" name="gelijk" id="gelijk"checked>	
			    <?php
				}
				else
				{
				?>
		    	<input type="checkbox" name="gelijk" id="gelijk">	
			    <?php
				}
				?>
			</div>

	    	<input type="hidden" name="addScore" value="addscore">
			<input type="submit" name="submit" value="Score vastleggen">
	    </form>    
    </div>
  	<div class="col-md-4">
  		<h2>Nu speelt:</h2>
                <table class="table">
                    <tbody class="nowplaying">
                      
                    </tbody>
                </table>
  	</div>
</div>

	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>