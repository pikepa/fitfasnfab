<?php
session_start();
$week=$_SESSION['week'];


        
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/head.inc.php";
        include_once($path);   
        $path1 = $_SERVER['DOCUMENT_ROOT'];
        $path1 .= "/login/includes/api.php";
         include_once($path1);
        logged_in();
?>
<!--- Meta Data for this page   --> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../img/favicon.ico">

<title>This Weeks Nutrition</title>

<!--  Include CSS and Links   ======= -->
    <style type="text/css">
        @import url("/css/main-css.css")
    </style>

</head>
<body >
    <!---- Include Header    ----->
    <?php
		include '../includes/menubars.inc.php';
		include_once '../mysql/hidden_files/database.php';
			
		$sql = "SELECT * FROM `xff_std_weeks` where `week_code` = :week";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':week', $week, PDO::PARAM_INT);   
        $stmt->execute();
		$obj = $stmt->fetchObject();
        $dispweek=$obj->week;
     ?>       
    <!----- Main Page --->




    
    <div class="wrapper">
        <div class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Weekly Program</span></h1>
            </div>
            <div class="col-md-10">
              <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="challenge_weeks.php"><span><i class="fa fa-calendar"></i> <?php echo "$dispweek"; ?></a></li>
                  <li role="presentation""><a href="challenge_weeks_hwork.php"><span><i class="fa fa-pencil"></i> Homework</a></li>
                  <li role="presentation" class="active"><a href="challenge_weeks_exercise.php"><span><i class="fa fa-heartbeat"></i> Exercise Plan</a></li>
                  <li role="presentation"><a href="challenge_weeks_nutrition.php"><span><i class="fa fa-cutlery"></i> Nutrition Plan</a></li>
                    <li role="presentation"><a href="challenge_home.php"><span><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
          </div>
        </div>
    </div>  
    <div class="container">
        <div class="row">
            <div class="col-md-2">          
            </div>
            <div class="col-md-10">
             <div Id='home'>
                 <p>This exercise content will be loaded via the weekly load from the DB</p>
             </div>
            </div>
        </div>
    </div>


    <!---- Include common Footer    ----->
    <?php include '../includes/footer.html'; ?>  

    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

</body>
</html>
