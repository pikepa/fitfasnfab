<?php 

// MySQL settings
$host = "localhost";
$user = "fitnfast";
$password = "pap4163pap";
$database = "fitfastnfab";

// Check if all settings are filled in
if(!empty($host) && !empty($user) && !empty($password) && !empty($database)) {
	// Try connection, if it fails throw exception to stop everything
	try {
		if(!mysqli_connect($host, $user, $password, $database)) {
			throw new Exception("MySQL can not connect, please check your settings in config.php");
		} else {
			$my_connection = mysqli_connect($host, $user, $password, $database); // Do not edit, this is the MySQL connection
		}
	} catch(Exception $e) {
		echo $e->getMessage();
		exit;
	}
}
?>