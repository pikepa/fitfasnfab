<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Registration</title>

  
	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("../css/main-css.css")
		</style>

		<link type="text/css"
 			 id="snipcart-theme"
 			 href="https://cdn.snipcart.com/themes/base/snipcart.min.css" 
  			rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  
  <body>

    <!---- Include Header    ----->
	<?php include '../includes/navbar.html';?>  

    
    <div class="wrapper">    
    
      <!-- Showcase
      ================ -->
      <div id="wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              
                <h2 class="animated slideInDown">Register here to enter our site</h2>
                
            <button class="btn btn-success" data-toggle="modal" data-target="#registration">Register</button>
                <div class="modal" id="registration">
                    <div class="modal-dialog">
                    
                        <div class="modal-content">
                        
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">x</button>
                                
                                <h4 class="modal-title">Registration</h4>
                            </div>
                        
                        </div>           
                    </div>
                </div>
      
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
      
	<script type="text/javascript" 
  			id="snipcart" 
  			src="https://cdn.snipcart.com/scripts/snipcart.js"
  			data-api-key="ZWUxODdjN2YtNTk1OS00ZWE1LTg0ZDgtODIwYzdlZTg3MDVj">
  	</script>


  </body>
</html>
