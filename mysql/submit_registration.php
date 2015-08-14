<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/mysql/hidden_files/db_config.php";
include_once($path);

session_start();

$user_id=$_POST['uid'];
$username=$_POST['username'];
$challenge_code=$_POST['sel_challenge'];
$name_preference=$_POST['p_name'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$first_challenge=$_POST['first_challenge'];
$how_found=$_POST['how'];
$primary_reason=$_POST['motivation'];


	$link=$my_connection ;    // to connect on live database
        
        $query="SELECT count(*) FROM fitfastnfab.xff_registrations where user_id ='$user_id' AND challenge_code = '$challenge_code'";
        $result=mysqli_query($link,$query) or die(mysql_error);
        $row = mysqli_fetch_array($result);
        $mycount = $row[0];
                if (intval($mycount,10)>0) {
               // echo '<script language="javascript">';
               // echo 'alert("You are already registered")';
               // echo '</script>';
                header("Location: /theChallenge/challenge_home.php") ;
                    exit; 
                }else{
                
	$query = "INSERT INTO xff_registrations (`user_id`, `username`, `challenge_code`, `name_preference`,`dob`,`gender`,`first_challenge`,`how_found`,`primary_reason`) 
            VALUES('$user_id', '$username','$challenge_code', '$name_preference','$dob','$gender','$first_challenge','$how_found','$primary_reason')" ;

        $result = mysqli_query($link, $query) or die(mysql_error());
		mysqli_close($my_conneection);
		$_SESSION['challenge']=$challenge_code; 
                header("Location: /theChallenge/challenge_home.php") ;
        exit; 
         }
 ?>