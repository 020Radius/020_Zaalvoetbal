<?php
 function Security($input) {
	$output = $input;
	$mysqli = get_my_db();
	$output = addslashes($output);
	$output = $mysqli->real_escape_string($output);
	$output = htmlspecialchars($output);
	
	return $output;
}


function Jordyhash($string) {
	$output = sha1($string);
	
	return $output;
}



?>