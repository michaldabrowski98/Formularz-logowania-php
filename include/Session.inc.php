<?php
	class Session{
		function Start(){
			session_start();
		}
		function Stop(){
			session_unset();
		}
	}
?>