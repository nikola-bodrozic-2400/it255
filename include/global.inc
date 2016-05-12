<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "it255";
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Konekcija ima grešku: " . $conn->connect_error);
	}

	class AppWide{

		public static function cleanString($str) {
			global $conn;
			return $conn->real_escape_string(trim($str));
    	}

    	public static function isUniq($str){
 			global $conn;
 			$sql = "SELECT * FROM korisnici WHERE username=?";
			$query = $conn->prepare($sql);
			$query->bind_param('s',$str);
			$query->execute();
			$query->store_result();
			if ($query->num_rows > 0) {
				return true;
			} else{
				return false;
			}
			$query->close();   		
    	}
	}
?>