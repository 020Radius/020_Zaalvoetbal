<?php  
require 'config/connect.php';



if ( !isset($_GET['msg']) == 'reset' )
{
	die('Permission error');
}

	$sql = "UPDATE teams SET gewonnen = '0', punten = '0', gelijk = '0'";
	$query = $mysqli->query($sql);

	$sql = "UPDATE poulewedstrijden SET goals_slot_1 = '0', goals_slot_2 = '0', gelijk = '0', winnaar = ''";
	$query = $mysqli->query($sql) or die(mysqli_error($mysqli));

	$message = urlencode('Data succesvol gereset.');
	header('location: selectWedstrijd.php?msg=' . $message);


?>