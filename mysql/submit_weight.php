<?php
include_once './hidden_files/db_config.php';

$user_id=$_POST['uid'];
$username=$_POST['username'] ;
$up_date=$_POST['up_date']  ;
$wgt_type=$_POST['wgt_type'] ;
$weight=$_POST['weight'] ;
$meas_type=$_POST['meas_type']        ;
$chest=$_POST['chest']     ;
$waist=$_POST['waist'] ;
$hips=$_POST['hips']  ;
$left_thigh=$_POST['left_thigh'] ;
$right_thigh=$_POST['right_thigh'] ;

	 	 $link=$my_connection ;    // to connect on live database
         if (mysqli_connect_error()) {

	 	          die("Could not connect to database");

                }

	 	$query = "INSERT INTO `xff_wandm`(`user_id`, `username`, `date`, `wgt_type`,          `weight`,`meas_type`,`chest`,`waist`,`hips`,`left_thigh`,`right_thigh`) 
        VALUES('$user_id', '$username','$up_date', '$wgt_type','$weight','$meas_type','$chest','$waist','$hips','$left_thigh','$right_thigh')" ;

        $result = mysqli_query($link, $query) or die(mysql_error());
        header("Location: /theChallenge/challenge_home.php") ;
        exit; 
   
    
