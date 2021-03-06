<html><!--- Meta Data for this page   --> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../img/favicon.ico">

<title>Admin Homework</title>
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
    ?>
  


    <!-- Main body
    ================== -->
    <div class="wrapper">
        <div class="section-header">
           <div class="container">
            <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Edit Homework</span></h1>
            </div>
            <div class="col-md-10">
              <ul class="nav nav-tabs">
                  <li role="presentation" ><a href="challenge_admin.php"><span><i class="fa fa-calendar"></i>Messages</a></li>
                    <li role="presentation" class="active"><a href="#"><span><i class="fa fa-pencil"></i> Homework</a></li>
                    <li role="presentation" ><a href="challenge_admin.exercise.php"><span><i class="fa fa-heartbeat"></i> Exercise Plan</a></li>
                    <li role="presentation" ><a href="challenge_admin.nutrition.php"><span><i class="fa fa-cutlery"></i> Nutrition Plan</a></li>
                    <li role="presentation"><a href="challenge_home.php"><span><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            </div>
             </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">  
                        <a href="../mysql/add_homework.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Homework</a>
                    </div>
                    <div class="col-md-8">
                    <div class="clearfix"></div>
                <?php
                $type="HOM";
                $query= "SELECT * FROM xff_wk_messages WHERE type =:type ORDER BY week_code, sort_order" ; 
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':type', $type, PDO::PARAM_STR);
                $stmt->execute();
                $total_no_of_records = $stmt->rowCount(); ?>
                
                 <table class='table table-bordered table-responsive'>
                    <tr>
                    <th style="width:10%">Week No</th>
                    <th style="width:40%">Title</th>
                    <th style="width:10%" colspan="2" class="text-center">Actions</th>
                    </tr>
                <?php
                while ($row = $stmt->fetchObject()) { ?>
                    <tr>
                        <td><?php echo $row->week_code; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td align="center">
                            <a href="../mysql/edit_homework.php?edit_id=<?php echo $row->uid; ?>"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="../mysql/delete_homework.php?delete_id=<?php echo $row->uid; ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php
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
