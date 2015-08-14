<?php
// used to connect to the database
$host = "localhost";
$user = "fitnfast";
$password = "pap4163pap";
$dbname = "fitfastnfab";
 
try {
    $conn = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}

?>


