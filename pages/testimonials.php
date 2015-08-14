    <!--- Meta Data for this page   --> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Testimonials</title>

   <?php 
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/head.inc.php";
        include_once($path);
    ?>

 </head>
  
  <body >
    
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
            <div class="col-xs-12">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Testimonials</span></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="hl text-center top-zero">Well Done to the following</h1>
            <p class="lead text-center">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget consequat sapien. Phasellus ac augue velit. Cras malesuada lectus et purus consequat porttitor. Vivamus a ultrices ante.
            </p>
            <br />
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="team">
              <div class="member-left">
                <img src="/img/face1.jpg" alt="Team Member" class="left">
                <h4>Alex Smith</h4>
                <p class="position">CEO</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget consequat sapien. Phasellus ac augue velit. Cras malesuada lectus et purus consequat porttitor.</p>
              </div>
              <div class="member-right">
                <img src="/img/face2.jpg" alt="Team Member" class="right">
                <h4>Dan Smith</h4>
                <p class="position">Project Manager</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget consequat sapien. Phasellus ac augue velit. Cras malesuada lectus et purus consequat porttitor.</p>
              </div>
              <div class="member-left">
                <img src="/img/face3.jpg" alt="Team Member" class="left">
                <h4>David Smith</h4>
                <p class="position">Engineer</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget consequat sapien. Phasellus ac augue velit. Cras malesuada lectus et purus consequat porttitor.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
        
  <!---- Include common Footer    ----->
	<?php 
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/footer.html";
        include_once($path);
    ?>  
    
    <!-- JavaScript
    ================================================== -->


    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
    
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

  </body>
</html>
