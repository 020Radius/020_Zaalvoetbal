<?php
require '../config/connect.php';

$sql = "SELECT wedstrijdnr, slot_1, slot_2 FROM poulewedstrijden WHERE winnaar = '' AND gelijk = '0' ORDER BY wedstrijdnr ASC LIMIT 11";
$query = $mysqli->query($sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query) ) {
        echo '<tr class="schema_content">';
        echo '<td>' . $row['wedstrijdnr'] . '</td>';
        echo '<td>' . $row['slot_1'] . '</td>';
        echo '<td> - </td>'; 
        echo '<td>' . $row['slot_2'] . '</td>';
        echo '</tr>';
    }
} else {
    echo 'no rows found...';
}

mysqli_free_result($query);
mysqli_close($mysqli);
?>