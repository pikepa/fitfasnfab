<?php
// MySQL settings
$host = "localhost";
$user = "root";
$password = "root";
$database = "fitfastnfab";

// Check if all settings are filled in
if(!empty($host) && !empty($user) && !empty($password) && !empty($database)) {
	// Try connection, if it fails throw exception to stop everything
	try {
		if(!mysqli_connect($host, $user, $password, $database)) {
			throw new Exception("MySQL can not connect, please check your settings in config.php");
		} else {
			$con = mysqli_connect($host, $user, $password, $database); // Do not edit, this is the MySQL connection
		}
	} catch(Exception $e) {
		echo $e->getMessage();
		exit;
	}
}


// Language settings
$language = "english"; // Name of the language file without extension

// Script path setting
$script_path = "/login/"; // Path to main folder from this script, starting in public_html (begin with / and end with /)
?>
