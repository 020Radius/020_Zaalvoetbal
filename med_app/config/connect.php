<?php

error_reporting(E_ALL);

//Database verbinding

function get_my_db()
{
static $mysqli;

if (!$mysqli) 
{

//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "1234";
//Database naam
$dbname = "fifadev";

$mysqli = new mysqli($host,$dbuser,$dbpass,$dbname);
}

return $mysqli;
}
// voerd connectie functie uit.
$mysqli = get_my_db();

//connectie error?
if (mysqli_connect_error($mysqli))
  {
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
  }

  
  
  
//Functies
Include("Functies.php");
 

?>