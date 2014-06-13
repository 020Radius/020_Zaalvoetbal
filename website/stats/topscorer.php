<?php 
require '../config/connect.php';

$sql = "SELECT voornaam, tussenvoegsel, achternaam, doelpunten FROM spelers ORDER BY doelpunten DESC LIMIT 5";
$query = $mysqli->query($sql);

if (mysqli_num_rows($query) == 5) {
  echo '<h2>Topscorer</h2>';
    while($row = mysqli_fetch_assoc($query))
	{
  
    echo '<h3>' . $row['voornaam'] . ' ' . $row['tussenvoegsel'] . ' ' . $row['achternaam'];
    echo '<span class="badge">' . $row['doelpunten'] . '</span></h3>'; 
     }   
mysqli_close($mysqli);
}

?>
