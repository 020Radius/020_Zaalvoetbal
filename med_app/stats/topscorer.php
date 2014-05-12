<?php 
require '../config/connect.php';

$sql = "SELECT voornaam, tussenvoegsel, achternaam, doelpunten FROM spelers ORDER BY doelpunten DESC LIMIT 1";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    echo '<h2>Topscorer</h2>';
    echo '<h3>' . $row['voornaam'] . ' ' . $row['tussenvoegsel'] . ' ' . $row['achternaam'];
    echo '<span class="badge">' . $row['doelpunten'] . '</span></h3>'; 
        
mysqli_close($con);
}

?>
