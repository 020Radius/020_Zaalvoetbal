<?php 
require '../config/connect.php';

$sql2 = "SELECT count FROM gespeelt LIMIT 1";
$query2 = $mysqli->query($sql2);

$row2 = mysqli_fetch_object($query2);

if($row2->count > 18)
{
$sql = "SELECT naam, totaal_punten FROM teams ORDER BY punten DESC LIMIT 2,2";
$query = $mysqli->query($sql);

    $i = 1;
    while ($row = mysqli_fetch_assoc($query)){
       echo '<tr>';
       echo "<td> $i </td>";
       echo "<td>" . $row['naam'] . "</td>";
       echo "<td>" . $row['totaal_punten'] . "</td>";
       echo '</tr>';
       $i++;
    }
    }
	else
	{
	echo "Nog niet beslist";
	}
    mysqli_close($mysqli);
?>
    
    
				