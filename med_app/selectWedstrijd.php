<?php  
	require 'config/connect.php';
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Selecteer wedstrijd Poule-fase</h1>
			<button class="btn btn-danger" id="reset">reset alle data <span class="glyphicon glyphicon-exclamation-sign"></span></button>
			<button class="btn btn-default pull-right" id="streaming">naar Livestream</button>
			<p>
			<?php  
				if ( isset($_GET['msg']) )
				{
					echo $_GET['msg'];
				}
			?>
			</p>
		</div>
		<div class="row">
			<?php  
			$sql = "SELECT * FROM poulewedstrijden";
			
			if ( !$query = mysqli_query($con, $sql) ) 
			{
				echo 'Kan de wedstrijden niet tonen';
				exit();
			}
			?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Wedstrijdnr.</th>
						<th>Slot 1</th>
						<th></th>
						<th>Slot 2</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					while ($row = mysqli_fetch_assoc($query) )
					{
						echo '<tr>';
						echo '<td><a href="addscore.php?id=' . $row['wedstrijdnr'] . '">' . $row['wedstrijdnr'] . '</a></td>';
						echo '<td><a href="addscore.php?id=' . $row['wedstrijdnr'] . '">' . $row['slot_1'] . '</a></td>';
						echo '<td><a href="addscore.php?id=' . $row['wedstrijdnr'] . '"> - </a></td>';
						echo '<td><a href="addscore.php?id=' . $row['wedstrijdnr'] . '">' . $row['slot_2'] . '</a></td>';
						echo '</tr>'; 
					}
					?>
				</tbody>
			</table>
		</div>
		
	</div>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="js/script.js"></script>
</body>