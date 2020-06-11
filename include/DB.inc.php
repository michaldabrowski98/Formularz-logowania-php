<?php
	class DB {
		public function __construct(){
			require_once('config.php');
			$connection = mysqli_connect(HOST,USER,PASSWORD);
			mysqli_select_db($connection,DATABASE);
			if (!$connection) {
				echo 'problem';
				die;
			}
			return $connection;
		}
		public function close(){
			mysqli_close();
		}
	}
?>