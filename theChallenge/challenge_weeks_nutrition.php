<?php
session_start();
$week=$_SESSION['week'];

if(isset($_POST['change_menu'])) {
	$menu=$_POST['menu_type']; }else{
	$menu="Tone and Shape";
}
        
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
		include_once '../includes/menubars.inc.php';
		include_once '../mysql/hidden_files/database.php';
			
		$sql = "SELECT * FROM `xff_std_weeks` where `week_code` =:week";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':week', $week, PDO::PARAM_INT);   
        $stmt->execute();
		$obj = $stmt->fetchObject();
        $dispweek=$obj->week;

			
     ?>
      <!---- Main Body    -----> 
    <div class="wrapper">
        <div style= "margin-bottom:20px" class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Weekly Program</span></h1>
            </div>
            <div class="col-md-10">
              <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="challenge_weeks.php"><span><i class="fa fa-calendar"></i><?php echo " $dispweek" ?> </a></li>
                    <li role="presentation" ><a href="challenge_weeks_hwork.php"><span><i class="fa fa-pencil"></i> Homework</a></li>
                    <li role="presentation" ><a href="challenge_weeks_exercise.php"><span><i class="fa fa-heartbeat"></i> Exercise Plan</a></li>
                    <li role="presentation" class="active"><a href="challenge_weeks_nutrition.php"><span><i class="fa fa-cutlery"></i> Nutrition Plan</a></li>
                    <li role="presentation"><a href="challenge_home.php"><span><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
          </div>
		 <div class="col-md-6">
			<h4 style="margin:0px" class="fff-color">Hi <?php echo userValue(null, "FirstName"); ?> - Welcome to this week's Nutrition Plan.</h4>
			</div>
			 <div class="col-md-6">
			 <form name="selectmenu" method="post" action="../theChallenge/challenge_weeks_nutrition.php" class="form-inline">
					  <div class="form-group">
						<label for="menu_type">Choose Your Menu :</label>
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
					  <button name="change_menu" type="submit" class="btn btn-success">Select Menu</button>
					</form>	
	 			</div>

			</div>
			</div>

		 <div class="container">


		<?php
					$sql = "SELECT `day_code`,`meal_type`,`name`,`description`,`uid`,`img_link`  FROM `xff_meals` where `week_code` = :week_code 
					AND `menu_type` = :menu_type order by `day_code` ,  `meal_sort` ASC";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':week_code', $week, PDO::PARAM_STR); 
					$stmt->bindParam(':menu_type', $menu, PDO::PARAM_STR);   
					$stmt->execute();
					//$obj = $stmt->fetchObject();
					//$meal_name=$obj->name;
					/* Fetch all of the remaining rows in the result set */
					//print("Fetch all of the remaining rows in the result set:\n");
					$result = $stmt->fetchAll();
					$count = $stmt->rowCount();
					$iterations=$count/4 ;
					//print_r($result);
					if ($iterations >=1 ) {

					$days=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
					$x=0 ;
					$z=1 ;
					while ($z <= $iterations) {
							$value=$days[$z-1]; //this takes the array and returns the day of the week
		?>
		 <div class="row">
            <div class="col-md-1"> 
				<h4 class="text-center"><?php echo $value; ?></h4>
            </div>
            <div class="col-md-10">
				 

		<div class="row">
		  	<div class="col-md-3 col-sm-6">
				<div class="thumbnail">
					<h5 class="text-center"> Breakfast </h5>
				  		<img style="max-height:150px" class="img-responsive" src="<?php echo $result[$x][5]; ?>" wifth="100%" alt="...">
					  <div class="visit"><a href="../theChallenge/challenge_meal_detail.php?uid=<?php echo $result[$x][4]; ?>" ><i  class="fa fa-question-circle"></i> More details...</a></div>
						<div class="caption text-center">
						   <h5 ><?php echo $result[$x][2]; ?></h5>
					  </div>
					</div>
			</div>
				  <div class="col-md-3 col-sm-6">
					 <div class="thumbnail">
					<h5 class="text-center"> Lunch </h5>
					  <img style="max-height:150px" class="img-responsive" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTD7JtuYeoyvUMB3x1BCGh_vOTQVgBPFNUoGH3IiPlt88MleNPofQ"  alt="...">
					  <div class="visit"><a href="../theChallenge/challenge_meal_detail.php?uid=<?php echo $result[$x+1][4]; ?>"><i class="fa fa-question-circle"></i> More details...</a></div>
						<div class="caption text-center">
						<h5><?php echo $result[$x+1][2]; ?></h5>
					  </div>
					</div>
			</div>
				  <div class="clearfix visible-sm"></div>
				  <div class="col-md-3 col-sm-6">
					<div class="thumbnail">
 					<h5 class="text-center">Dinner</h5>
   					  <img style="max-height:150px" class="img-responsive" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSeQLUtD_26EF15l0Kmot3yOhSxEPZYoaRZvNhlXyQrB1HKgpZlrw"  alt="...">
					  <div class="visit"><a href="../theChallenge/challenge_meal_detail.php?uid=<?php echo $result[$x+2][4]; ?>"><i class="fa fa-question-circle"></i> More details...</a></div>
						<div class="caption text-center">
						<h5><?php echo $result[$x + 2][2]; ?></h5>
					  </div>
					</div>
			</div>
				  <div class="col-md-3 col-sm-6">
					<div class="thumbnail" >
					<h5 class="text-center">Snacks</h5>
					  <img style="max-height:150px" class="img-responsive" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSq-OoHCwbq_IoePyeggx-8xA03IpJ3PcfD5mIFv3CMBa5ud93U"  alt="...">
					  <div class="visit"><a href="../theChallenge/challenge_meal_detail.php?uid=<?php echo $result[$x+3][4]; ?>"><i class="fa fa-question-circle"></i> More details...</a></div>
						<div class="caption text-center">
						<h5><?php echo $result[$x+3][2]; ?></h5>
					  </div>
					</div>
	  			 </div>
				</div>
			   </div>
			</div>
<?php 
			
				$z=$z+1 ; 
				$x=$x+4;
			}
		
	 ?>
		
	
			<?php			}else { ?>
		<div class="row">
            <div class="col-md-12">
		<h4 class="fff-color text-center">Sorry we're working on it but there are no Menus set at this time</h4>
			</div>
		<?php
		}			
		?>			
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
