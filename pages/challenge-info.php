<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Dev :: Pricing Page</title>

  
	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("/css/main-css.css")
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
    var shiftWindow = function() { scrollBy(0, -90) };
    window.addEventListener("hashchange", shiftWindow);
    function load() { if (window.location.hash) shiftWindow(); }
  </script>



  </head>
  
  <body onload="load()">
    
 

    <!---- Include Header    ----->
   <?php  
    include '../includes/menubars.inc.php';
    ?>

    
    
    <!-- Main body
    ================== -->
<div class="wrapper">
      <div class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Challenge Information</span></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container ">
          <div class="row setHeight"id="info-how">
            <div class="col-md-6 col-sm-12">
                <h3>How it Works</h3>
                <p class="justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mi eu eros viverra vulputate. Etiam eget dolor mattis, vehicula eros                 nec, venenatis diam. Maecenas non pulvinar arcu. Cras auctor nibh odio, non vehicula ante dictum mattis. Nullam tortor turpis, tristique vel commodo nec,                       porttitor vel justo. Vivamus nunc velit, dignissim id fringilla ut, eleifend vel libero. Donec tellus mauris, efficitur eu iaculis ut, eleifend in felis. Nunc                 quis purus faucibus, pharetra sapien vitae, hendrerit nisl. Proin consectetur ante quis nunc consectetur convallis. Mauris accumsan libero tellus, vitae                       tincidunt nulla fermentum non. Sed vehicula, purus eget vehicula viverra, mauris lorem dapibus ligula, vitae fermentum purus enim at sapien. Phasellus et                       tincidunt turpis. Aenean mauris nibh, accumsan sed nisi eget, finibus ullamcorper est.</p>
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="thumbnail">
              <img src="/img/lgfimages/Body-Blitz-Full-Workout-300x300.jpg" class="img-responsive" alt="...">
            </div>  
            </div>
        </div>

        <div class="row setHeight" id="info-training">
            <div class="col-md-6 col-sm-12">
                <h3>Training</h3>
                <p class="justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mi eu eros viverra vulputate. Etiam eget dolor mattis, vehicula eros                 nec, venenatis diam. Maecenas non pulvinar arcu. Cras auctor nibh odio, non vehicula ante dictum mattis. Nullam tortor turpis, tristique vel commodo nec,                       porttitor vel justo. Vivamus nunc velit, dignissim id fringilla ut, eleifend vel libero. Donec tellus mauris, efficitur eu iaculis ut, eleifend in felis. Nunc                 quis purus faucibus, pharetra sapien vitae, hendrerit nisl. Proin consectetur ante quis nunc consectetur convallis. Mauris accumsan libero tellus, vitae                       tincidunt nulla fermentum non. Sed vehicula, purus eget vehicula viverra, mauris lorem dapibus ligula, vitae fermentum purus enim at sapien. Phasellus et                       tincidunt turpis. Aenean mauris nibh, accumsan sed nisi eget, finibus ullamcorper est.</p>
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="thumbnail">
              <img src="/img/lgfimages/Body-Blitz-Full-Workout-300x300.jpg" class="img-responsive" alt="...">
            </div>  
            </div>
        </div>
         <div class="row setHeight" id="info-nutrition">
            <div class="col-md-6 col-sm-12">
                <h3>Nutrition</h3>
                <p class="justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mi eu eros viverra vulputate. Etiam eget dolor mattis, vehicula eros                 nec, venenatis diam. Maecenas non pulvinar arcu. Cras auctor nibh odio, non vehicula ante dictum mattis. Nullam tortor turpis, tristique vel commodo nec,                       porttitor vel justo. Vivamus nunc velit, dignissim id fringilla ut, eleifend vel libero. Donec tellus mauris, efficitur eu iaculis ut, eleifend in felis. Nunc                 quis purus faucibus, pharetra sapien vitae, hendrerit nisl. Proin consectetur ante quis nunc consectetur convallis. Mauris accumsan libero tellus, vitae                       tincidunt nulla fermentum non. Sed vehicula, purus eget vehicula viverra, mauris lorem dapibus ligula, vitae fermentum purus enim at sapien. Phasellus et                       tincidunt turpis. Aenean mauris nibh, accumsan sed nisi eget, finibus ullamcorper est.</p>
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="thumbnail">
              <img src="/img/lgfimages/Body-Blitz-Full-Workout-300x300.jpg" class="img-responsive" alt="...">
            </div>  
            </div>
        </div>
        <div class="row setHeight" id="info-motivation">
            <div class="col-md-6 col-sm-12">
                <h3>Motivation</h3>
                <p class="justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mi eu eros viverra vulputate. Etiam eget dolor mattis, vehicula eros                 nec, venenatis diam. Maecenas non pulvinar arcu. Cras auctor nibh odio, non vehicula ante dictum mattis. Nullam tortor turpis, tristique vel commodo nec,                       porttitor vel justo. Vivamus nunc velit, dignissim id fringilla ut, eleifend vel libero. Donec tellus mauris, efficitur eu iaculis ut, eleifend in felis. Nunc                 quis purus faucibus, pharetra sapien vitae, hendrerit nisl. Proin consectetur ante quis nunc consectetur convallis. Mauris accumsan libero tellus, vitae                       tincidunt nulla fermentum non. Sed vehicula, purus eget vehicula viverra, mauris lorem dapibus ligula, vitae fermentum purus enim at sapien. Phasellus et                       tincidunt turpis. Aenean mauris nibh, accumsan sed nisi eget, finibus ullamcorper est.</p>
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="thumbnail">
              <img src="/img/lgfimages/Body-Blitz-Full-Workout-300x300.jpg" class="img-responsive" alt="...">
            </div>  
            </div>
        </div>
        <div class="row" id="info-community">
            <div class="col-md-6 col-sm-12">
                <h3>Community</h3>
                <p class="justified">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mi eu eros viverra vulputate. Etiam eget dolor mattis, vehicula eros                 nec, venenatis diam. Maecenas non pulvinar arcu. Cras auctor nibh odio, non vehicula ante dictum mattis. Nullam tortor turpis, tristique vel commodo nec,                       porttitor vel justo. Vivamus nunc velit, dignissim id fringilla ut, eleifend vel libero. Donec tellus mauris, efficitur eu iaculis ut, eleifend in felis. Nunc                 quis purus faucibus, pharetra sapien vitae, hendrerit nisl. Proin consectetur ante quis nunc consectetur convallis. Mauris accumsan libero tellus, vitae                       tincidunt nulla fermentum non. Sed vehicula, purus eget vehicula viverra, mauris lorem dapibus ligula, vitae fermentum purus enim at sapien. Phasellus et                       tincidunt turpis. Aenean mauris nibh, accumsan sed nisi eget, finibus ullamcorper est.</p>
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="thumbnail">
              <img src="/img/lgfimages/Body-Blitz-Full-Workout-300x300.jpg" class="img-responsive" alt="...">
            </div>  
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
