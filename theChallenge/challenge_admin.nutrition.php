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
    include_once '../classes/class.goals.crud.php';
    
    
 if (!empty($_GET['style'])) {
       $style = $_GET['style'];
       $week_code = $_GET['week_code'];
 }else{
       $style = "Select a Level";
       $week_code = "Select a Week";
      }
   ?>
  


    <!-- Main body
    ================== -->
    <div class="wrapper">
        <div class="section-header">
           <div class="container">
            <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Nutrition Plans</span></h1>
            </div>
            <div class="col-md-8">
              <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="challenge_admin.php"><span><i class="fa fa-calendar"></i>Messages</a></li>
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
                    <form action="../theChallenge/challenge_admin.nutrition.php" method="get" id="find" class="form-inline">    
                            <div class="form-group" >
                                  <label class="control-label" for="style">Level</label>
                                 <select class="form-control"  name="style">
                                    <option value=""><?php echo $style;?></option>
                                    <option value="MEA">Meat Eaters</option>
                                    <option value="VEG">Vegetarians</option>
                                    <option value="VEA">Vegans</option>
                                 </select>
                            </div>
                                <div class="form-group" >
                                  <label class="control-label" for="week_code">Week</label>
                                    <select class="form-control"  name="week_code">
                                      <option value=""><?php echo $week_code;?></option>
                                      <?php
                                          $query= "SELECT * FROM xff_std_weeks ORDER BY week_code" ; 
                                          $stmt = $conn->prepare($query);
                                          $stmt->execute();
                                          while ($wrow = $stmt->fetchObject()) { ?>
                                          <option><?php echo $wrow->week_code; ?></option>';
                                          <?php
                                          }
                                          ?>
                                  </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Find me some Food.</button>
                    </form>

                <?php
                $query= "SELECT * FROM xff_nutrition where `style` =:style AND `week_no`=:week_code ORDER by `seq_no` ASC" ; 
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':style', $style, PDO::PARAM_STR);
                $stmt->bindParam(':week_code', $week_code, PDO::PARAM_STR);
                $stmt->execute();
                $total_no_of_records = $stmt->rowCount();
                    
                if($total_no_of_records >0) { 
                    ?>
                 <table class='table table-bordered table-responsive'>
                    <tr>
                    <th style="width:10%">Days</th>
                    <th class="text-center" style="width:10%" colspan="3" >Actions</th>
                    </tr>
                <?php
                while ($row = $stmt->fetchObject()) { ?>
                    <tr>
                        <td><?php echo $row->description; ?></td>
                        <td class="text-center">
                        <a href="../mysql/edit_homework.php?edit_id=<?php echo $row->uid; ?>"><i class="fa fa-search"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="../mysql/edit_homework.php?edit_id=<?php echo $row->uid; ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="../mysql/delete_homework.php?delete_id=<?php echo $row->uid; ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php
                }
                } else {
                    echo "There are no records to display";

                }
  
                ?>
 


        </table>


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
