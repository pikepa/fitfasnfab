    
    <!--- Meta Data for this page   --> 


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Nutrition</title>

   <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/includes/head.inc.php";
    include_once($path);
    ?>
  

  
	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("../css/main-css.css")
		</style>
   
  
  </head>
  
  <body >
    
 

    <!---- Include Header    ----->
	<?php include '../includes/navbar.html';?>  

    
    
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
          <div class="row ">
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
    </div>
    <nav>
        <ul class="pager">
            <li><a href="../pages/info-training.php">Previous</a></li>
            <li><a href="../pages/info-motivation.php">Next</a></li>
    </ul>
    </nav>
      
</div>
      

    
  <!---- Include common Footer    ----->
   <?php  
    include '../includes/menubars.inc.php';
    ?> 

   
    
    <!-- JavaScript
    ================================================== -->
    
    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
    
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

  </body>
</html>
