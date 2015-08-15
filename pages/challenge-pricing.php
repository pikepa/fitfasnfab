    <?php 
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    $path1 .= "/login/includes/api.php";
    include_once($path1);
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Challenge Pricing</title>

  
	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("../css/main-css.css")
		</style>
	
		<script type="text/javascript"
  			src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
  		</script>

		<script type="text/javascript" 
  			id="snipcart" 
  			src="https://cdn.snipcart.com/scripts/snipcart.js"
  			data-api-key="ZWUxODdjN2YtNTk1OS00ZWE1LTg0ZDgtODIwYzdlZTg3MDVj">
  		</script>

		<link type="text/css"
 			 id="snipcart-theme"
 			 href="https://cdn.snipcart.com/themes/base/snipcart.min.css" 
  			rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        Snipcart.execute('bind', 'order.completed', function (order) {
        var url = '/theChallenge/registration.php?order=' + order.token;
        window.location.href = url;
         });
    </script>
  </head>
  
  <body>

    <!---- Include Header    ----->
	<?php 
		//include '../includes/menubars.inc.php'; 
		include_once '../mysql/hidden_files/database.php';

		// Check to see whether the User has already registered for a Challenge


		$sql = "SELECT * 
				FROM  `xff_registrations` 
				INNER JOIN  `xff_challenges` ON `reg_uid` =`challenge_uid` 
				WHERE `user_id` = :user_id and `active_chal`='YES'";
			
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['uid'], PDO::PARAM_INT); 
        $stmt->execute();
		$obj = $stmt->fetchObject();
		$exist = $stmt->rowCount();

		if ($exist > 0 ) { ?>
			<script> location.replace("../theChallenge/challenge_home.php"); </script>?
		<?php }  ?> 
	  
    <!-- Main body
    ================== -->
    <div class="wrapper">
      <div class="section-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Pricing Page</span></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <h1 class="hl text-center zero-top">2015 FFF Challenge Pricing</h1>
        </div>
        <div class="row pricing">
           <div class="col-sm-3 col-sm-offset-3">
            <div class="item animated fadeInDown third">
              <div class="head">
                <h4>Earlybirds</h4>
                <div class="arrow"></div>
              </div>
              <div class="sceleton">
                <h5>$140<span></span></h5>
              <ul>
                <li>Pay before August 15th</li>
                <li>Receive a 30% Discount</li>
                <li>Access to all items in </li>
                <li>the Full Program </li>
              </ul>
              <a href="#"
                 <?php if(!is_logged_in()) {?>
                         class="snipcart-add-item btn hidden btn-pink"
                 <?php } else { ?>
                         class="snipcart-add-item btn btn-pink"
                 <?php } ?>
   				data-item-id="1"
   				data-item-name="Earlybird FFF 12 Week Challenge"
   				data-item-price="200.00"
    			data-item-weight="0"
   				data-item-url="http://5852746c.ngrok.com/pages/challenge-pricing.php"
   				data-item-description="Early Bird Registration for Sept 2015 FFF Challenge Registration">
   				Early Bird Registration
				</a>

              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="item animated fadeInDown third">
              <div class="head">
                <h4>In Full</h4>
                <div class="arrow"></div>
              </div>
              <div class="sceleton">
                <h5>$199<span></span></h5>
              <ul>
                <li>Join the 12 Wk Workout Program</li>
                <li>Join the 12 Wk Nutrition Program</li>
                <li>Receive Personalised Coaching</li>
                <li>Access to Web/Mobile Tracking Tools</li>
              </ul>
              <a href="#"
                 <?php if(!is_logged_in()) {?>
                         class="snipcart-add-item btn hidden btn-pink"
                 <?php } else { ?>
                         class="snipcart-add-item btn btn-pink"
                 <?php } ?>
    			
   				data-item-id="2"
   				data-item-name="FFF 12 Week Challenge"
   				data-item-price="199.00"
    			data-item-weight="0"
   				data-item-url="https://fitfastnfab.com/letsgetfit/pages/challenge-pricing.php"
   				data-item-description="FFF Challenge Registration">
   				FFF Challenge Registration
				</a>
              </div>
             </div>
           </div>
            <div class='col-md-6 col-md-offset-3 text-center pink'>
                 <?php if(!is_logged_in()) {
                 echo "<a href='/login/login.php'/><h4>You need to Register or be Logged in to select an option and pay</h4></a>";
              } ?>
            </div>
        </div>

      </div>
      
    </div>
    
  <!---- Include common Footer    ----->
	<?php include '../includes/footer.html';?>  

   
    
    <!-- JavaScript
    ================================================== -->
    
    <!-- JS Global -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
    
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

  </body>
</html>
