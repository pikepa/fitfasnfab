<?php
session_start();

        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/includes/head.inc.php";
        include_once($path);   
        $path1 = $_SERVER['DOCUMENT_ROOT'];
        $path1 .= "/login/includes/api.php";
         include_once($path1);
        logged_in();
		$uid=$_GET['uid'];
?>
<!--- Meta Data for this page   --> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../img/favicon.ico">

<title>Meal Detail</title>

<!--  Include CSS and Links   ======= -->
    <style type="text/css">
        @import url("/css/main-css.css")
    </style>

</head>
<body >
    <!---- Include Header    ----->
    <?php
        include '../includes/menubars.inc.php';
    ?>
    <!-- Main body
    ================== -->
<?php


include_once '../mysql/hidden_files/database.php';

					$sql = "SELECT `day_code`,`meal_type`,`name`,`description`,`recipe`  FROM `xff_meals` where `uid` = :uid";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':uid', $uid, PDO::PARAM_INT); 
					$stmt->execute();
					$result = $stmt->fetch();
					//$obj = $stmt->fetchObject();
					//$meal_name=$stmt->name;
					/* Fetch all of the remaining rows in the result set */
					//print("Fetch all of the remaining rows in the result set:\n");
					//$result = $stmt->fetchAll();
					//$count = $stmt->rowCount();
					//print_r($result);
					
?>
    <div class="wrapper">
       <div style= "margin-bottom:20px" class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Meal Detail</span></h1>
            </div>
            <div class="col-md-8">
                <h4 class="text-center"><?php echo $result ["name"] ; ?> </h4>	

            </div>
          </div>
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-2">  
					<div class="thumbnail">
					  <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT4pB1xv_ajJKy26nxDsGIRjRYGC1IcbrqOtyK2P24xm-CzIg9L" class="img-responsive" alt="...">
					</div>           
			</div>
			<div class="col-md-2 col-sm-2">  
 			<h4 style="margin:0px">Description :</h4>           
			</div>
            <div class="col-md-6 text-justify">
			<?php echo $result ["description"];?>
            </div>
        </div>
		<div class="row">
            <div class="col-md-2">  
         
			</div>
			<div class="col-md-2 col-sm-2">  
 			<h4 style="margin:0px">Recipe :</h4>           
			</div>
            <div class="col-md-6 text-justify">
			<?php echo $result ["recipe"];?>
            </div>
        </div>
		<div style="margin-top:20px" class="row">
			<?php
					$sql = "SELECT `ingredient`,`qty`,`units`  FROM `xff_meal_ingredients` where `meal_uid` = :meal_uid";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':meal_uid', $uid, PDO::PARAM_INT); 
					$stmt->execute();
					
					?>

            <div class="col-md-2">  
         	</div>
			<div class="col-md-2 col-sm-2">  
 			<h4 style="margin:0px">Ingredients :</h4>           
			</div>
            <div class="col-md-6 text-justify">
			<table class='table table-bordered table-responsive'>
				 <tr>
				 <th style="width:20%">Ingredient</th>
				 <th style="width:5%">Qty</th>
				 <th style="width:10%">Unit</th>
				 </tr>
							<?php 
				while ($row = $stmt->fetchObject()) { ?>
					<tr>
					<td><?php echo $row->ingredient ;?> </td>			 
					<td><?php echo $row->qty ;?> </td>			 
					<td><?php echo $row->units ;?> </td>			 
		 			</tr>	
				<?php } ?>
			</table>
			<?php	
				$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	  			echo "<a href='$url'>back</a>"; 
				?>
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
