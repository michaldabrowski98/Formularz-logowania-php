<?php
include('DB.inc.php');
	class User{  
		public function __construct()
		{
			$this->db = new DB();
		}
		public function login($login,$password){
			
			
			//Funkcja mysqli_real_escape_string() ma za zadanie usunięcie z ciągu znaków, znaków szczególnych takich jak \
			//htmlentities() tłumaczy znaki do encji html
			//ma to zapobiec atakom sql injection
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
			$password = htmlentities($password, ENT_QUOTES, "UTF-8");
			$login = mysqli_real_escape_string($this->db->__construct(),$login);
			$password = mysqli_real_escape_string($this->db->__construct(),$password);
			
			//ctype_alnum() sprawdza czy wszystkie znaki są alfanumeryczne, preg_match() określa które znaki są użyte w loginie, ma to zapobiec
			//ataką typu filesystem attack
			if (!ctype_alnum($login) || !preg_match('/^(?:[a-zA-z0-9_-]|\.(?!\.))+$/iD', $login)) {
    die("Niprawidłowy login");
			}
			//Kodowanie hasła za pomocą algorytmuy kryptograficznego md5
			$password = md5($password);
			
			$result = mysqli_query($this->db->__construct(),"SELECT * FROM users WHERE login = '".$login."' AND password = '".$password."'") or die("ERROR");
			var_dump($result);
			var_dump($login);
			$rows_num = mysqli_num_rows($result);
			var_dump($rows_num);
			$user = mysqli_fetch_assoc($result);
			if ($rows_num > 0) {
				
				$_SESSION['signed'] = true;
				
				
				$_SESSION['id'] = $user['id'];
				$_SESSION['login'] = $user['login'];
				$_SESSION['email'] = $user['email'];
				
				return true;
			} 
			else {
				$_SESSION['signed'] = false;
				$_SESSION['error'] = '<span style = "color: red;">Nieprawidłowy login lub hasło</span><br/>';
				return false;
			}
		}
	}
?>
