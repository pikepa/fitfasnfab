<?php 

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/includes/head.inc.php";
    include_once($path);

    $path1 = $_SERVER['DOCUMENT_ROOT'];
    $path1 .= "/login/includes/api.php";
    include_once($path1);
    logged_in();
    ?>
    <!--- Meta Data for this page   --> 

    <link rel="icon" href="../img/favicon.ico">

    <title>Add Meals</title>

 
	<!--  Include CSS and Links   ======= -->
<?php include '../includes/form_validation_includes.php'; ?>
	<style type="text/css">
	@import url("/css/main-css.css")
        </style>
<?php
 
        include_once '../mysql/hidden_files/database.php';


		

        if(!isset($_POST['btn-save'])) {
			$week_code="";
			$week="Select a Week";
				}

		if(isset($_POST['btn-save'])) {
				if ($_FILES["file"]["error"] > 0)
					{
					echo "Error: " . $_FILES["file"]["error"] . "<br>";
					}
					else
					{
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"../uploads/" . $_FILES["file"]["name"]);
					}
			
			$sort_array = array("Breakfast"=>"1", "Lunch"=>"2", "Dinner"=>"3", "Snacks"=>"4");
            $menu_type=$_POST['menu_type'];
            $week_code = htmlspecialchars($_POST['week_code']);
			$day_code="DAY".$_POST['day'];
            $meal_type = htmlspecialchars($_POST['meal_type']);
			$meal_sort=$sort_array[$_POST['meal_type']];
			$name= htmlspecialchars($_POST['name']);
            $description = nl2br2($_POST['description']);
		    $recipe = nl2br2($_POST['recipe']);
            $img_link = "../uploads/" . $_FILES["file"]["name"];
                $query= "INSERT INTO xff_meals (
                    menu_type,
                    week_code,
					day_code,
					meal_type,
					name,
					description,
					recipe,
					img_link,
					meal_sort
					) VALUES (
                    :menu_type,
                    :week_code,
                    :day_code,
					:meal_type,
                    :name,
                    :description,
                    :recipe,
                    :img_link,
					:meal_sort)" ;
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':menu_type',$menu_type, PDO::PARAM_STR);   
                $stmt->bindParam(':week_code', $week_code, PDO::PARAM_STR);   
                $stmt->bindParam(':day_code', $day_code, PDO::PARAM_STR);   
                $stmt->bindParam(':meal_type', $meal_type, PDO::PARAM_STR);   
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);   
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);   
                $stmt->bindParam(':recipe', $recipe, PDO::PARAM_STR);   
                $stmt->bindParam(':img_link', $img_link, PDO::PARAM_STR);   
                $stmt->bindParam(':meal_sort', $meal_sort, PDO::PARAM_INT);   
                
                if($stmt->execute())
                {
                       //header("Location: ../mysql/add_goals.php?inserted");
                ?>       <script> location.replace("../mysql/add_meal.php?inserted"); </script>?<?php
                }
                else
                {
                ?>       <script> location.replace("../mysql/add_meal.php?failure"); </script>?<?php
                }
        }
?>  
 </head>
  
  <body >
    
 

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
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Adding Meals</span></h1>
            </div>
            <div class="col-md-8">

            </div>
          </div>
        </div>
        </div>  
    <div class="container">
        <div class="row">
            <div class="col-md-3">  
            </div>
            <div class="col-md-5">      

                <?php
                if(isset($_GET['inserted']))
                {
                        ?>
                        <div class="alert alert-info">
                    <strong>WOW!</strong> Record was inserted successfully !
                        </div>
                    <?php
                }
                else if(isset($_GET['failure']))
                {
                     ?>
                        <div class="alert alert-warning">
                    <strong>SORRY!</strong> ERROR while inserting record !


                        </div>
                    <?php
                }
                ?>
<form id="add-meal" class="form-horizontal" method="post" enctype="multipart/form-data" >
			 <div class="form-group">
                <div class="col-md-5 no-left-padding">
				<label for="menu_type">Choose Menu :</label>
				<select class="form-control" name="menu_type">
				<?php
				$query= "SELECT * FROM xff_menu_type  " ; 
				$stmt = $conn->prepare($query);
				$stmt->execute(); ?>
				<?php
				while ($row = $stmt->fetchObject()) { ?>
				<option ><?php echo $row->menu_type; ?></option>';
				<?php
				}
				?>
					</select>
				 </div>	
				 </div>
            <div class="form-group">
               <div class="col-md-5 no-left-padding">
                <label for="week_code">Week</label>
                <select id="week_code" class="form-control"  name="week_code">
                    <option value="<?php echo $week_code; ?>"><?php echo $week; ?></option>
                    <?php
                        $query= "SELECT * FROM xff_std_weeks ORDER BY week_code" ; 
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        while ($row = $stmt->fetchObject()) { ?>
                        <option value="<?php echo $row->week_code; ?>"><?php echo $row->week; ?></option>';
                        <?php
                        }
                        ?>
                </select>
               </div>
            </div>
			<div class="form-group">
				<div class="col-md-3 no-left-padding">
				<label for="day">Choose Day :</label>
				<select class="form-control" name="day">
					<option >01</option>;
					<option >02</option>;
					<option >03</option>;
					<option >04</option>;
					<option >05</option>;
					<option >06</option>;
					<option >07</option>;
				</select>
				</div>
			</div>
				<div class="form-group">
				<div class="col-md-4 no-left-padding">
				<label for="meal_type">Choose Meal :</label>
				<select class="form-control" name="meal_type">
					<option >Breakfast</option>;
					<option >Lunch</option>;
					<option >Dinner</option>;
					<option >Snacks</option>;
				</select>
				</div>
			</div>
                <div class="form-group" >
                  <label class="control-label" for="name">Meal Name</label>
                  <input class="form-control"type="text" name="name" placeholder="Enter the name of your meal here." value="" >  
                </div>
	                <div class="form-group" >
					<label class="control-label" for="file">Select image</label>
					<input id="file" type="file" class="file" name="file">
					</div>	
                  <div class="form-group">
                    <label class="control-label" for="description">Description</label>
                    <textarea class="form-control"type="text" name="description" placeholder="Describe the Meal here" rows="5"></textarea>  
                  </div>
	              <div class="form-group">
                    <label class="control-label" for="receipe">Receipe</label>
                    <textarea class="form-control"type="text" name="recipe" placeholder="How do you make this meal." rows="10"></textarea>  
                  </div>
                    <table>
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                            <span class="glyphicon glyphicon-plus"></span> Create New Record
                                    </button>  
                            <a href="../theChallenge/challenge_admin.nutrition.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to main page.</a>
                        </td>
                    </tr>
                    </table>
                </form>
              </div>
            </div>
          </div>
        </div>
  
<script>
$(document).ready(function() {
    $('#add-homework').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            week_code: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                }
            },
            
        }
    });
});
</script>
<?php

function nl2br2($string) { 
$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string); 
return $string; 
}

?>

    
  <!---- Include common Footer    ----->
	<?php include '../includes/footer.html';?>  

   
    
    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>
  </body>
</html>
