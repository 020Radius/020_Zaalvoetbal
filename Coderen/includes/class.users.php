<?php
//USERS CLASSES
//Haald informatie op
class JordyUser {
	var $id = 0; 
	var $username = "Gast";
	var $password = null;

    var $user = array('0','Gast','null');
	
	function JordyUser($name){
	$mysqli = get_my_db();

		    $query = $mysqli->query("SELECT * FROM users WHERE username = '".$name."' LIMIT 1") or die (mysqli_connect_error());
			$User->user = mysqli_fetch_assoc($query)  or die (mysqli_connect_error());
		    $this->id = $User->user['id'];
			$this->username = $User->user['username'];
			$this->password = $User->user['password'];
		    
		
		}
		
	

}


class User
{
	public static $username, $user, $id, $password = array();

	private static $superuser;
	
	public static function getUserData($value)
	{
	
		if(isset($_SESSION['userdata'])) {
			static::$superuser = $_SESSION['userdata'];
		
			return self::$superuser->$value;
		}
		
		
	
	}

	}
	
?>