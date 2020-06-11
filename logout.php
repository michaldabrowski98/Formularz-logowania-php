<?php
	require_once('include/Session.inc.php');
	$session = new Session();
	$session->Start();
	
	$session->Stop();
	
	header('Location: index.php');
?>