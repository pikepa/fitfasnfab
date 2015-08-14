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
        if(isset($_POST['btn-save']))
        {
            $week_code = htmlspecialchars($_POST['week_code']);
            $title = htmlspecialchars($_POST['title']);
            $message = nl2br2($_POST['message']);
            $link_label= htmlspecialchars($_POST['link_label']);
            $link = htmlspecialchars($_POST['link']);
            $img_link = htmlspecialchars($_POST['img_link']);
            $notes = nl2br2($_POST['notes']);
                $query= "INSERT INTO xff_wk_messages (
                    week_code,
                    title,
                    message,
                    link_label,
                    link,
                    img_link,
                    notes) VALUES (
                    :week_code,
                    :title,
                    :message,
                    :link_label,
                    :link,
                    :img_link,
                    :notes)" ;
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':week_code', $week_code, PDO::PARAM_STR);   
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);   
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);   
                $stmt->bindParam(':link_label', $link_label, PDO::PARAM_STR);   
                $stmt->bindParam(':link', $link, PDO::PARAM_STR);   
                $stmt->bindParam(':img_link', $img_link, PDO::PARAM_STR);   
                $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);   
                
                if($stmt->execute())
                {
                       //header("Location: ../mysql/add_goals.php?inserted");
                ?>       <script> location.replace("../mysql/add_messages.php?inserted"); </script>?<?php
                }
                else
                {
                ?>       <script> location.replace("../mysql/add_messages.php?failure"); </script>?<?php
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
              <h1 class="animated slideInLeft"><span>Adding Messages</span></h1>
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
<form id="add-message" class="form-horizontal" method="post" >
            <div class="form-group">
               <div class="col-md-5 no-left-padding">
                <label for="week_code">Week</label>
                <select id="week_code" class="form-control"  name="week_code">
                    <option value="">Select Option</option>
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
                  <input id="title" class="form-control"type="text" name="title" placeholder="Enter title for your message here" value="" >  
                </div>
                  <div class="form-group">
                    <label class="control-label" for="message">Message</label>
                    <textarea id="message" class="form-control"type="text" name="message" placeholder="Enter your message here" rows="5"></textarea>  
                  </div>
                        <div class="form-group">
                    <label for="link_label">Button Title</label>
                    <input id="link_label" class="form-control" type="text" name="link_label" placeholder="Enter a label for the button associated with the link"/>
                   </div>
                    <div class="form-group">
                    <label for="link">Url</label>
                    <input id="link" class="form-control" type="text" name="link" placeholder="Enter a URL which might be related to this message"/>
                   </div>
                    <div class="form-group">
                    <label for="link">Img Link</label>
                    <input id="img_link" class="form-control" type="text" name="img_link" placeholder="Enter a URL for an image related to this message"/>
                   </div>
                    <div class="form-group">
                    <label for="Notes">Notes</label>
                    <input id="Notes" class="form-control" type="text" name="notes" placeholder="Notes" value="" />
                  </div>
                    <input type='hidden' name='uid' value='<?php echo $_SESSION['uid'] ?>'>
                    <input type='hidden' name='username' value='<?php echo userValue(null, "username") ?>'>
                    <table>
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                            <span class="glyphicon glyphicon-plus"></span> Create New Record
                                    </button>  
                            <a href="../theChallenge/challenge_admin.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to main page.</a>
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
    $('#add-message').formValidation({
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
