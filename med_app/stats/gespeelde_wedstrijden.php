 <?php 
require '../config/connect.php';

$sql = "SELECT wedstrijdnr, slot_1, slot_2, goals_slot_1, goals_slot_2 FROM poulewedstrijden WHERE winnaar != '' OR gelijk != '0' ORDER BY wedstrijdnr ASC LIMIT 11";
$query = mysqli_query($con, $sql) or die(mysqli_error());

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query) ) {
        echo '<tr class="schema_content">';
        echo '<td>' . $row['wedstrijdnr'] . '</td>';
        echo '<td>' . $row['slot_1'] . '</td>';
        echo '<td> - </td>'; 
        echo '<td>' . $row['slot_2'] . '</td>';
        echo '<td>' . $row['goals_slot_1'] . '-' . $row['goals_slot_2'] . '</td>';
        echo '</tr>';
    }
} else {
    echo 'Nog geen wedstrijden gespeeld';
}
mysqli_free_result($query);
mysqli_close($con);

?>
