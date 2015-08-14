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

    <title>Delete Messages</title>

 
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
	$sql = "DELETE FROM xff_wk_messages WHERE uid =  :id limit 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        
        ?>       
        <script> location.replace("../theChallenge/challenge_admin.hwork.php"); </script>
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
              <h1 class="animated slideInLeft"><span>Delete Homework</span></h1>
            </div>
            <div class="col-md-8">
                <h4 >You sure, <?php echo userValue(null, "FirstName"); ?>,
    you want to delete this ? </h4>
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
$sql= "SELECT * FROM xff_wk_messages WHERE uid=:id";
$stmt = $conn->prepare($sql); 
$stmt->bindParam(':id', $uid, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();




if(isset($msg))
{
	echo $msg;
}
?>
         
<form id="delete-homework" class="form-horizontal" method="post" >
               <div class="form-group">
               <div class="col-md-5 no-left-padding">
                <label for="Week">Week</label>
                <select class="form-control"  name="week_code">
                    <option value=""><?php echo $obj->week_code;?></option>
                </select>
               </div>
            </div>
            <div class="form-group" >
              <label class="control-label" for="title">Heading</label>
              <input id="title" class="form-control"type="text" name="title" value="<?php echo $obj->title;?>" >  
            </div>

            <div class="form-group" >
              <label class="control-label" for="message">Work Package</label>
              <textarea id="message" class="form-control"type="text" name="message" rows="10"><?php echo str_replace("<br />", "\n", $obj->message); ?></textarea>  
        </div>
              <div class="form-group" >
              <label class="control-label" for="link_label">Button Text</label>
              <input id="link_label" class="form-control"type="text" name="link_label" value="<?php echo $obj->link_label;?>"> 
        </div>
            <div class="form-group" >
              <label class="control-label" for="link">Button Url</label>
              <input id="link" class="form-control"type="text" name="link" value ="<?php echo $obj->link;?>"> 
        </div>
            <div class="form-group" >
              <label class="control-label" for="img_link">Image Url</label>
              <input id="img_link" class="form-control"type="text" name="img_link" value="<?php echo $obj->img_link;?>">
        </div>
            <div class="form-group">
              <label class="control-label" for="notes">Notes</label>
              <textarea id="notes" class="form-control"type="text"name="notes" rows="5"><?php echo str_replace("<br />", "\n", $obj->notes); ?></textarea>  
        </div>
         <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
            <a href="../theChallenge/challenge_admin.hwork.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>            </td>
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
