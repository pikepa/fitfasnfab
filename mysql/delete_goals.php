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

    <title>Delete Goals</title>

 
	<!--  Include CSS and Links   ======= -->
<?php include '../includes/form_validation_includes.php'; ?>
	<style type="text/css">
	@import url("/css/main-css.css")
        </style>
<?php
 
        include_once '../mysql/hidden_files/database.php';
        include_once '../classes/class.goals.crud.php';
        
        
if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$sql = "DELETE FROM xff_goals WHERE uid =  :id limit 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        
        ?>       
        <script> location.replace("../theChallenge/challenge_goals.php"); </script>
        <?php    
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
              <h1 class="animated slideInLeft"><span>Deleting a Goal</span></h1>
            </div>
            <div class="col-md-8">
                <h4 >Oh dear <?php echo userValue(null, "FirstName"); ?>,
    was this one too hard ? </h4>
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
$uid=$_GET["delete_id"];
$sql= "SELECT timeframe,goal,actions FROM xff_goals WHERE uid=:id";
$stmt = $conn->prepare($sql); 
$stmt->bindParam(':id', $uid, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();




if(isset($msg))
{
	echo $msg;
}
?>
         
<form id="delete-goal" class="form-horizontal" method="post" >
            <div class="form-group">
            <label for="timeframe">Timeframe</label>
               <input id="timeframe" class="form-control" name="timeframe" value="<?php echo $obj->timeframe; ?>"/>
         </div>
            <div class="form-group" >
              <label class="control-label" for="goal">Goal</label>
              <textarea id="goal" class="form-control"type="text" name="goal" rows="5"><?php echo str_replace("<br />", "\n", $obj->goal); ?></textarea>  
        </div>
              <div class="form-group">
              <label class="control-label" for="actions">Actions</label>
              <textarea id="actions" class="form-control"type="text"name="actions" rows="5"><?php echo str_replace("<br />", "\n", $obj->actions); ?></textarea>  
        </div>
         <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
            <a href="../theChallenge/challenge_goals.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>            </td>
        </tr>
 
    </table>
</form>
                
                

              </div>
            </div>
          </div>
        </div>
  

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
