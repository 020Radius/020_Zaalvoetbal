<?php

require 'config/connect.php';
require 'functions.php';


function nowPlaying($con) {
	$id = stripslashes($_GET['id']);

	$sql = "SELECT * FROM poulewedstrijden WHERE wedstrijdnr = '$id'";
	$query = mysqli_query($con, $sql);
	
	
	if ( !mysqli_num_rows($query) == 1 ) {
		echo 'Kan de geselecteerde wedstrijd niet vinden...';
	}

	$row = mysqli_fetch_assoc($query);

	mysqli_free_result($query);
	return $row['slot_1'] . ' VS ' . $row['slot_2'];	
}

function getPlayers($con) {
	$id = stripslashes($_GET['id']);

	$sql = "SELECT spelers.id, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, teams.naam FROM spelers INNER JOIN teams ON spelers.team_id = teams.id WHERE poulewedstrijden.id = '$id'";
	$query = mysqli_query($con, $sql);
		
	
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
		<h2 class="text-center"> <?php echo nowPlaying($con); ?> </h2>
		<a href="selectwedstrijd.php"><button class="btn btn-default">Wedstrijd selecteren</button></a>
	</div>
	

	<?php 
		$id = stripslashes($_GET['id']);
		$sql2 = "SELECT * FROM poulewedstrijden WHERE wedstrijdnr = '$id'";
		$query = mysqli_query($con, $sql2);
		$row = mysqli_fetch_assoc($query);
	?>
	<div class="score col-md-8">
	    <form role="form" action="__addScore.php?id=<?php echo $id?>" METHOD="POST">
			<legend>Eindscore</legend>
			<div class="form-group">
		        <label class="labelBig" for="score1"  id="score1"><?php echo $row['slot_1']; ?></label>
		    	<input type="number" name="score1" id="score1" class="inputBig">
			</div>
			
			<div class="form-group">
		    	<label class="labelBig" for="score2" id="score2" name="score2"><?php echo $row['slot_2']; ?></label>
		    	<input type="number" name="score2" id="score2" class="inputBig">
			</div>
			
			<input type="submit" name="update" value="update score">
			
			<div class="form-group">
		    	<label class="labelMedium" for="winnaar" id="winnaar">winnaar</label>
				<?php echo $row['slot_1'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_1'] ?>">
				<?php echo $row['slot_2'] ?><input class="inputMedium" type="radio" name="winnaar" id="winnaar" value="<?php echo $row['slot_2'] ?>">
			
			</div>
			
			<div class="form-group">
		    	<label class="labelMedium" for="gelijk" id="gelijk">gelijk</label>
		    	<input type="checkbox" name="gelijk" id="gelijk">	
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