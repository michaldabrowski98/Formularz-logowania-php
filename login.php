<?php
require_once('include/Session.inc.php');
	$session = new Session();
	$session->Start();
if ((isset($_SESSION['signed'])) && $_SESSION['signed'] == false) {
	header('Location: index.php');
}
$_SESSION['echo'] =  'cokolwiek';
include 'include/User.inc.php';
if ((isset($_POST['login'])) && (isset($_POST['password']))) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$user = new User();
	$user_is_login = $user->login($login,$password);
	var_dump($user_is_login);
	if($user_is_login){
		header('Location: user.php');
	}
	else{
		header('Location: index.php');
	}
}

?>