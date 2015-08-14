<?php
session_start();
include_once './hidden_files/db_config.php';

$user_id=$_POST['uid'];
$username=$_POST['username'] ;
$challenge=$_SESSION['challenge'];
$up_date=$_POST['up_date']  ;
$ttrial=$_POST['timetrial'] ;
$phold=$_POST['plankhold'] ;
$mpups=$_POST['minpups']        ;
$wsit=$_POST['wallsit']     ;

	 	 $link=$my_connection ;    // to connect on live database
         if (mysqli_connect_error()) {
 	          die("Could not connect to database");
                }
                
 $query = "INSERT INTO `xff_fitness_results`(`user_id`, `username`, `challenge_code`,`date`, `timetrial`,`plankhold`,`pushups`,`wallsit`) 
        VALUES('$user_id', '$username','$challenge','$up_date', '$ttrial','$phold','$mpups','$wsit')" ;

        $result = mysqli_query($link, $query) or die(mysqli_error());
        header("Location: /theChallenge/challenge_home.php") ;
        exit; 
   
    
