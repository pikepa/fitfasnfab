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
	$day="Day".$_POST['day'];
	$dayno=$_POST['day'];
   	}else{
	$menu="Tone and Shape";
	$week="PR01";
	$day="DAY01";
	$dayno="01";
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
                        <a href="../mysql/add_meal.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add a Plan</a>
                    </div>
                    <div class="col-md-8">

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
						 		<div class="form-group">
								<label for="day">Choose Day :</label>
								<select class="form-control" name="day">
									<option ><?php echo $dayno ?></option>;
									<option >01</option>;
									<option >02</option>;
									<option >03</option>;
									<option >04</option>;
									<option >05</option>;
									<option >06</option>;
									<option >07</option>;
								</select>
							  </div>
							  <button name="change_menu" type="submit" class="btn btn-success">Select Menu</button>
							</form>	
								<?php
								$sql = "SELECT * FROM `xff_meals` where `week_code` = :week  and `menu_type` = :menu 
									and `day_code` = :day order by `meal_sort` ASC" ;
       							$ftch = $conn->prepare($sql);
        						$ftch->bindParam(':week', $week, PDO::PARAM_STR);  
								$ftch->bindParam(':menu', $menu, PDO::PARAM_STR); 
								$ftch->bindParam(':day', $day, PDO::PARAM_STR);   
        						$ftch->execute();
								?>
								                
							 <table class='table table-bordered table-responsive'>
								<tr>
								<th style="width:10%">Day</th>
								<th style="width:40%">Meal</th>
								<th style="width:40%">Name</th>
								<th style="width:10%" colspan="2" class="text-center">Actions</th>
								</tr>
							<?php
							while ($detrow = $ftch->fetchObject()) { ?>
								<tr>
									<td><?php echo $detrow->day_code; ?></td>
									<td><?php echo $detrow->meal_type; ?></td>
									<td><?php echo $detrow->name; ?></td>

									<td align="center">
										<a href="../mysql/edit_homework.php?edit_id=<?php echo $detrow->uid; ?>"><i class="fa fa-pencil-square-o"></i></a>
									</td>
									<td class="text-center">
										<a href="../mysql/delete_homework.php?delete_id=<?php echo $detrow->uid; ?>"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							<?php
							}
							?>


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
