<?php 
require '../config/connect.php';

$sql = "SELECT naam, totaal_punten FROM teams WHERE poule = 'A' ORDER BY punten DESC";
$query = mysqli_query($con, $sql);

    $i = 1;
    while ($row = mysqli_fetch_assoc($query)){
       echo '<tr>';
       echo "<td> $i </td>";
       echo "<td>" . $row['naam'] . "</td>";
       echo "<td>" . $row['totaal_punten'] . "</td>";
       echo '</tr>';
       $i++;
    }
    
    mysqli_close($con);
?>
    
    
				