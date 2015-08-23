<html><!--- Meta Data for this page   --> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../img/favicon.ico">

<title>Admin Nutrition</title>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/head.inc.php";
include_once($path);
?>
<!--  Include CSS and Links   ======= -->
<style type="text/css">
    @import url("/css/main-css.css")
</style>

</head>
<body>
    <!---- Include Header    ----->
    <?php
    include '../includes/menubars.inc.php';
    
    include_once '../mysql/hidden_files/database.php';

   if(isset($_POST['change_menu'])) {
	$menu=$_POST['menu_type'];
   	$week=$_POST['week_code'];
   	}else{
	$menu="Tone and Shape";
	$week="PR01";
	} 
   ?>
  


    <!-- Main body
    ================== -->
    <div class="wrapper">
        <div style="margin-bottom:20px" class="section-header">
           <div class="container">
            <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Nutrition Plans</span></h1>
            </div>
            <div class="col-md-8">
              <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="challenge_admin.php"><span><i class="fa fa-calendar"></i> Messages</a></li>
                    <li role="presentation" ><a href="challenge_admin.hwork.php"><span><i class="fa fa-pencil"></i> Homework</a></li>
                    <li role="presentation" ><a href="challenge_admin.exercise.php"><span><i class="fa fa-heartbeat"></i> Exercise Plan</a></li>
                    <li role="presentation" class="active"><a href="#"><span><i class="fa fa-cutlery"></i> Nutrition Plan</a></li>
                    <li role="presentation"><a href="challenge_home.php"><span><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            </div>
             </div>
        </div>

        
            <div class="container">
                <div class="row">
                    <div class="col-md-2">  
                        <a href="../mysql/add_homework.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add a Plan</a>
                    </div>
                    <div class="col-md-6">

					 <form name="selectmenu" method="post" action="../theChallenge/challenge_admin.nutrition.php" class="form-inline">
							  <div class="form-group">
								<label for="menu_type">Choose Menu :</label>
								<select class="form-control" name="menu_type">
							<?php
								$query= "SELECT * FROM xff_menu_type where `menu_type` != :menu_type " ; 
								$stmt = $conn->prepare($query);
								$stmt->bindParam(':menu_type', $menu, PDO::PARAM_STR);   
								$stmt->execute(); ?>
								<option ><?php echo $menu; ?></option>';
								<?php
									while ($row = $stmt->fetchObject()) { ?>
								<option ><?php echo $row->menu_type; ?></option>';
								<?php
								}
								?>
								</select>
							  </div>
						 <div class="form-group">
								<label for="week_code">Select Week :</label>
								<select class="form-control" name="week_code">
							<?php
								$sql = "SELECT * FROM `xff_std_weeks` where `week_code` != :week ";
       							$stmt = $conn->prepare($sql);
        						$stmt->bindParam(':week', $week, PDO::PARAM_STR);   
        						$stmt->execute();
								?>
								<option ><?php echo $week; ?></option>';
								<?php
									while ($obj = $stmt->fetchObject()) { ?>
								<option ><?php echo $obj->week_code; ?></option>';
								<?php
								}
								?>
								</select>
							  </div>
							  <button name="change_menu" type="submit" class="btn btn-success">Select Menu</button>
							</form>	

                


                    </div>
                </div>
            </div>  
    </div>




    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

</body>
</html>
