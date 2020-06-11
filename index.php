<?php
	require_once('include/Session.inc.php');
	$session = new Session();
	$session->Start();
	
	if ((isset($_SESSION['signed'])) && ($_SESSION['signed']==true))
	{
		header('Location: user.php');
		exit();
	}

?>
<html>
<head>
	<title>Logowanie</title>
</head>
<body>
	<h2>Zaloguj się:</h2>
		<form action = "login.php" method = "POST">
			Login:<input type="text" name="login"></input><br/><br/>
			Hasło:<input type="password" name="password"></input><br/><br/>
			<?php if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
			}?>
			<input type="submit" value="Zaloguj"></input><br/><br/>
	</form>
	
</body>
</html>