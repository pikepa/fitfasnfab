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

    <title>Add Goal</title>

 
	<!--  Include CSS and Links   ======= -->
<?php include '../includes/form_validation_includes.php'; ?>
	<style type="text/css">
	@import url("/css/main-css.css")
        </style>
<?php
 
        include_once '../mysql/hidden_files/database.php';
        include_once '../classes/class.goals.crud.php';
        $crud = new crud($conn);
        if(isset($_POST['btn-save']))
        {
                $user_id= $_POST["uid"] ;
                $username = $_POST['username'];
                $timeframe = $_POST['timeframe'];
                $goal = nl2br2($_POST['goal']);
                $actions = nl2br2($_POST['actions']);

                if($crud->create($user_id,$username,$timeframe,$goal,$actions))
                {
                       //header("Location: ../mysql/add_goals.php?inserted");
                ?>       <script> location.replace("../mysql/add_goals.php?inserted"); </script>?<?php
                }
                else
                {
                ?>       <script> location.replace("../mysql/add_goals.php?failure"); </script>?<?php
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
              <h1 class="animated slideInLeft"><span>Adding Goals</span></h1>
            </div>
            <div class="col-md-8">
                <h4 >Hi <?php echo userValue(null, "FirstName"); ?>,
    let's create some 'S.M.A.R.T' goals! </h4>
            </div>
          </div>
        </div>
        </div>  
    <div class="container">
        <div class="row">
            <div class="col-md-2">  
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
<form id="add-goal" class="form-horizontal" method="post" >
            <div class="form-group">
            <label for="timeframe">Timeframe</label>
            <select id="timeframe" class="form-control" name="timeframe">
                <option value="">Select an Option</option>
                <option value="1 Week">1 Week</option>
                <option value="2 Weeks">2 Weeks</option>
                <option value="3 Weeks">3 Weeks</option>
                <option value="1 Month">1 Month</option>
                <option value="2 Months">2 Months</option>
                <option value="3 Months">3 Months</option>
                <option value="6 Months">6 Months</option>
                <option value="1 Year">1 Year</option>
            </select>
        </div>
            <div class="form-group">
              <label class="control-label" for="goal">Goal</label>
              <textarea id="goal" class="form-control"type="text" name="goal" placeholder="Enter your goal here" rows="5"></textarea>  
        </div>
  
            <div class="form-group">
              <label class="control-label" for="actions">Actions</label>
              <textarea id="message" class="form-control"type="text" name="actions" placeholder="How are you going to achieve this goal" rows="5"></textarea>  
        </div>
        <input type='hidden' name='uid' value='<?php echo $_SESSION['uid'] ?>'>
        <input type='hidden' name='username' value='<?php echo userValue(null, "username") ?>'>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
                <a href="../theChallenge/challenge_goals.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to main page.</a>
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
    $('#add-goal').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            timeframe: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            goal: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                }
            },
            actions: {
                validators: {
                    notEmpty: {
                        message: 'The Units are required'
                    }
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
