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

    <title>Edit Homework</title>

 
	<!--  Include CSS and Links   ======= -->
<?php include '../includes/form_validation_includes.php'; ?>
	<style type="text/css">
	@import url("/css/main-css.css")
        </style>
<?php
 
        include_once '../mysql/hidden_files/database.php';
        include_once '../classes/class.goals.crud.php';
if(isset($_POST['btn-update']))
{
	$id = htmlspecialchars($_GET['edit_id']);
	$week_code = htmlspecialchars($_POST['week_code']);
        $title = htmlspecialchars($_POST['title']);
	$message = nl2br2($_POST['message']);
        $link_label= htmlspecialchars($_POST['link_label']);
	$link = htmlspecialchars($_POST['link']);
	$img_link = htmlspecialchars($_POST['img_link']);
	$notes = nl2br2($_POST['notes']);
            $query= "UPDATE xff_wk_messages SET 
                    week_code = :week_code, 
                    title = :title, 
                    message = :message,  
                    link_label = :link_label,  
                    link = :link,
                    img_link= :img_link,
                    notes=:notes
                    WHERE uid = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->bindParam(':week_code', $week_code, PDO::PARAM_STR);   
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);   
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);   
            $stmt->bindParam(':link_label', $link_label, PDO::PARAM_STR);   
            $stmt->bindParam(':link', $link, PDO::PARAM_STR);   
            $stmt->bindParam(':img_link', $img_link, PDO::PARAM_STR);   
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);   
            $stmt->execute();
}      
	


if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
            $query= "SELECT * FROM xff_wk_messages where uid=:id" ;
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
            $stmt->execute();
            $obj = $stmt->fetchObject();
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
              <h1 class="animated slideInLeft"><span>Edit Homework</span></h1>
            </div>
            <div class="col-md-8">
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
if(isset($msg))
{
	echo $msg;
}
?>
         
<form id="edit-message" class="form-horizontal" method="post" >
            <div class="form-group">
               <div class="col-md-5 no-left-padding">
                <label for="Week">Week</label>
                <select class="form-control"  name="week_code">
                    <option value=""><?php echo $obj->week_code;?></option>
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
    <table>
         <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update">
    		<span class="glyphicon glyphicon-plus">Update Record</span> 
            	</button>  
                <a href="../theChallenge/challenge_admin.hwork.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to main page.</a>
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
