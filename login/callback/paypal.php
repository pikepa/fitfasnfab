<?php
define('ROOT', dirname(__FILE__));

if(!isset($con)) {
	require(ROOT .'/../config.php');
}
if(!isset($titles)) {
	require(ROOT .'/../lang/'. $language .'.php');
}
if(!function_exists('getSetting')) {
	require(ROOT .'/../includes/functions.php');
}

@session_set_cookie_params(0, '/', getCurrentDomain()); 
@session_start();


// Check if paypal posted the custom value back
if(!empty($_POST['custom'])) {
	// Assign the posted value to variables and escape it for mysql
	$amount = mysqli_real_escape_string($con,$_POST['mc_gross']);
	$currency = mysqli_real_escape_string($con,$_POST['mc_currency']);
	$txn_id = mysqli_real_escape_string($con,$_POST['txn_id']);
	$receiver = mysqli_real_escape_string($con,$_POST['receiver_email']);
	$payer = mysqli_real_escape_string($con,$_POST['payer_email']);
	$custom = mysqli_real_escape_string($con,$_POST['custom']);
	
	
	// Check if txn_id already exists
	$txn_check = mysqli_query($con,"SELECT * FROM payments WHERE txn_id='$txn_id'");
	if (mysqli_num_rows($check) == 0) {
		$txn_id_valid = true;
	} else {
		$txn_id_valid = false;
	}
	
	// Check if activate_code exists
	$custom_check = mysqli_query($con,"SELECT * FROM users WHERE activate_code='$custom'");
	if (mysqli_num_rows($custom_check) == 1) {
		$custom_valid = true;
	} else {
		$custom_valid = false;
	}
	
	
	// Check if both checks are true
	if ($txn_id_valid == true && $custom_valid == true) {
		$u = mysqli_fetch_array($custom_check);
		$uid = $u['id'];
		$time = time();
		
		// Insert payment in MySQL
		mysqli_query($con,"INSERT INTO payments(uid, time, amount, currency, payer, receiver, txn_id)
		VALUES ('$uid','$time','$amount','$currency','$payer','$receiver','$txn_id')");
		
		
		if(getSetting("require_email", "text") == "true") {
			// Send activation mail if email validation is enabled
			$getuid = mysqli_query($con,"SELECT * FROM users WHERE activate_code='$custom'");
			$gu = mysqli_fetch_array($getuid);
			$val_url = getTypeUrl("activation") . $activate_code;
			
			$subject = getSetting("validation_mail_subject", "text");
			$subject = str_replace("{val_url}", $val_url, $subject);
			$subject = str_replace("{name}", $gu['username'], $subject);
			$subject = str_replace("{email}", $gu['email'], $subject);
			$subject = str_replace("{date}", date("j-n-Y", $gu['registered_on']), $subject);
			
			$message = getSetting("validation_mail", "text");
			$message = str_replace("{val_url}", $val_url, $message);
			$message = str_replace("{name}", $gu['username'], $message);
			$message = str_replace("{email}", $gu['email'], $message);
			$message = str_replace("{date}", date("j-n-Y", $gu['registered_on']), $message);
			$message = nl2br($message);
			$message = html_entity_decode($message);
			
			// Send mail through PHPMailer
			sendMail($gu['email'], $subject, $message, $gu['id']);
			
			// Update user to remove paypal link
			mysqli_query($con,"UPDATE users SET paypal='' WHERE id='$uid'");
		} else {
			// Update user to remove paypal link and activate it
			mysqli_query($con,"UPDATE users SET paypal='', active='1' WHERE id='$uid'");
		}
	}
}
?>