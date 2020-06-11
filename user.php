<?php

require_once('include/Session.inc.php');
	$session = new Session();
	$session->Start();
	
if ((isset($_SESSION['signed']) && $_SESSION['signed']==false) || (!isset($_SESSION['signed']))) {
	header('Location: index.php');
	exit();
}

?>
<html>
<head>
<title>Twoje konto</title>
</head>
<body>
		<?php echo '<h2>jesteś zalogowany jako '.$_SESSION['login'].'</h2>'; ?>
		<a href = "#">Strona główna</a>
		<a href = "#">Aktualności</a>
		<a href = "#">Kontakt</a>
		<a href = "#">O nas</a><br/><br/>
		<a href = "logout.php">Wyloguj</a>
</body>
</html>