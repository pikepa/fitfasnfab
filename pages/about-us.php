    
    <!--- Meta Data for this page   --> 


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>About Me</title>

 
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/includes/head.inc.php";
    include_once($path);
    ?>



	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("/css/main-css.css")
		</style>
	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

 
    <!---- Include Header    ----->

   	<?php 
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/menubars.inc.php";
        include_once($path);
    ?>  
 
    <!-- Main body
    ================== -->
    <div class="wrapper">
      <div class="section-header">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>About Me</span></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
         <h1 class="hl text-center top-zero">Philippa Morris</h1>
            <p class="lead text-center">
			I am a Health , Fitness Coach and Trainer.</p>
            <div class="col-md-3">
                <div class="thumbnail float-left">
                <img  src="/img/lgfimages/FFF-ProfilePic-222x300.jpg" alt="Profile Pic">
                </div>
            </div>
          <div class="col-md-9">

              
            <p>I am an avid runner having won numerous half marathons and 10 kms races having started at the bottom. 
			I know that if I can do it, then you can too. I believe that everyone CAN and SHOULD be running!
			I am passionate about health and nutrition and commited to help women achieve their fitness and weight goals. 
			A woman&#8217;s body goes through so many changes throughout her life and I believe it essential that we learn 
			to understand and appreciate our bodies as well as adapt training and nutrition to suit and meet current needs.
			My ambition is to inspire everyone to be fit, healthy and strong, and would like to help others to also become role models
			 in our society to lead the way for younger generations.
			I am happily married and a mother of two, and I live in Brunei Darussalam, in Borneo, 
			where I continue to grow my business empire.
			I myself transitioned from being an unfit, overweight new mum into the athlete that I am today. 
			I know what it takes to put in the effort and the hard work involved in doing so. I have done the research, 
			undertaken the studies and become an expert in the field so you don&#8217;t have to. I will be there with you, 
			sharing my expertise with you and leading you towards becoming the best you can be.
			In the pursuit of my life&#8217;s purpose I am now turning my passion into action. I offer a variety of
			 fitness solutions to cater for any preference or budget, so you can incorporate your fitness routine within your
			  current lifestyle in a realistic way.
			My current programs:<br />
			&#8211; Running clinics- Group outdoor sessions<br />
			&#8211; Personal training sessions<br />
			&#8211; Saturday super sessions<br />
			&#8211; Nutritional advice<br />
			&#8211; Health and Fitness info and blog via my Fit, Fast and Fab website
			P.xx</p>
            <br />
          </div>
        </div>

    <!---    <div class="row">
          <div class="col-md-12">
            <div class="about-btn">
              <a class="btn btn-default" href="team.html">Our Team</a> <a class="btn btn-default" href="contact.html">Contact Us</a>
            </div>
          </div>
        </div>   ---->
      </div>
    </div>
    
   
  <!---- Include common Footer    ----->
	<?php include '../includes/footer.html';?>  

  
    
    <!-- JavaScript
    ================================================== -->
    
    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
    
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

  </body>
</html>
