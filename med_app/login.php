<?php  
	require 'config/connect.php';
	session_start();
	if(isset($_POST['submit']))
	{
	$naam = addslashes($_POST['username']);
	$ww = addslashes($_POST['password']);
	if(!trim($naam) || !trim($ww))
	{
	$error = "Vul alles in!";
	}
	else
	{
	if($naam == "Admin" && $ww == "12348221")
	{
	$_SESSION['user'] = true;
 	echo '<meta http-equiv="refresh" content="0; URL=./SelectWedstrijd.php">';
	}
	else
	{
	$error = "Onjuiste gebruikersnaam of wachtwoord!";
	}
	}
	}
	
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
	<link rel="stylesheet" href="./css/login.css">
</head>
<body>
	  <div class="wrapper">
    <form class="form-signin" method="POST" action="#">  
<?php if(isset($error))
{
echo $error;
}	
?>
      <h2 class="form-signin-heading">Log In</h2>
      <input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" required="" autofocus="" />
	  <br>
      <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Onthoud me
      </label>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Log In"> 
    </form>
  </div>
</body>