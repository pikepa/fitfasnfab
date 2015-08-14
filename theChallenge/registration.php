    <?php 

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/includes/head.inc.php";
    include_once($path);

  
    ?>


    <!--- Meta Data for this page   --> 


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Registration</title>

 
	<!--  Include CSS and Links   ======= -->
    <?php include '../includes/form_validation_includes.php'; ?>
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
    <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 style=" margin-bottom:50px">Hi <?php echo userValue(null, "FirstName"); ?>, let's get your registration for the Challenge done!</h2>
				
				
	<!--	This style section is to modify the way Form Validation Icons are Displayed ----->		
					<style type="text/css">
					#registration .inputGroupContainer .form-control-feedback,
					#registration .selectContainer .form-control-feedback {
    				top: 0;
    				right: -30px;
					}
					</style>
				
             <form id="registration" class="form-horizontal" method="post" action="../mysql/submit_registration.php" >
                	<div class="form-group">
                    <label class="col-sm-3 control-label">Select your Challenge</label>
                     <div class="col-sm-4 inputGroupContainer">
                     <select class="form-control"  name="sel_challenge">
							<option value=""></option>
                            <?php
	 	                     $conn=$con ;    // to connect on live database
                                if (mysqli_connect_error()) {
                                die("Could not connect to database");
                                }
                                //Run Query
                                $stmt = "SELECT  `challenge` FROM `xff_challenges` ";
                                $result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                                while(list($category) = mysqli_fetch_row($result)){
                                echo '<option value="'.$category.'">'.$category.'</option>';
                                }
                                // -- mysqli_close($conn);
                                ?>
                            </select>
                            </div>
                    </div>
      
                    <div class="form-group">
        			<label class="col-sm-3 control-label">Preferred name:</label>
        			<div class="col-md-4 inputGroupContainer">
        			<input type="text" class="form-control" name="p_name" </input>
        			</div>
        			</div>
 
    
    				<div class="form-group">
        			<label class="col-sm-3 control-label">Date of Birth:</label>
        			<div class="col-sm-4 inputGroupContainer">
  					<input type="date" class="form-control" name="dob" placeholder="DD-MM-YYYY" ></input>
        			</div>
        			</div>
				
				
       				<div class="form-group" id="gender">
        			<label class="col-sm-3 control-label">Gender:</label>
        			<div class="col-md-4 inputGroupContainer" >
            		<label class="radio-inline"><input type="radio" value="Male" name= "gender">Male</label>
            		<label class="radio-inline"><input type="radio" value="Female" name= "gender">Female</label>
            		<label class="radio-inline"><input type="radio" value="Other" name= "gender">Other</label>
        			</div>
        			</div>  
    
    
        			<div class="form-group"  >
        			<label class="col-sm-3 control-label">Is this your first Challenge</label>
        			<div class="col-sm-2 inputGroupContainer"  >
            		<select class="form-control" name="first_challenge" >
                		<option value=""></option>
                		<option value="Yes">Yes</option>
                		<option value="No">No</option>
            		</select>  
            		</div>
         			</div>
			

      				<div class="form-group" id="howus" >
        			<label  class="col-sm-3 control-label">How did you find us?</label>
        			<div class="col-sm-4 inputGroupContainer" >
            		<select class="form-control" name="how" >
						<option value="" id="howus">Select one</option>
						<option value="Referral">Referral</option>
						<option value="Website">Website</option>
						<option value="Flyer">Flyer</option>
            		</select>        
        			</div>
        			</div>
    
					<div class="form-group">
					<label class="col-sm-3 control-label">Primary Motivation</label>
					<div class="col-sm-4 inputGroupContainer">
					<textarea value ="" class="form-control" name="motivation" rows="5" id="motivation"></textarea>
					</div>
					<input type='hidden' name='uid' value='<?php echo $_SESSION['uid'] ?>'>
        			<input type='hidden' name='username' value='<?php echo userValue(null, "username") ?>'>
					</div>

    
					<div class="row">
					<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<button type="submit" class="btn btn-success">Submit</button>
						<a class="btn btn-default" href="../theChallenge/challenge_home.php" role="button"> Cancel</a>
					</div>
					</div>      
					</div>
				</form>          
           	</div>
         </div>
     </div>
</div>                

<script>
		$(document).ready(function() {
			$('#registration').formValidation({
				framework: 'bootstrap',
				icon: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					sel_challenge: {
						validators: {
							notEmpty: {
								message: 'This is a required field'},   
							stringLength: {
									min: 3,
								message: 'This must be over 3 characters long'}   
						 }
					},
					p_name: {
						validators: {
							notEmpty: {
								message: 'This is a required field'},   
							stringLength: {
									min: 3,
								message: 'This must be over 3 characters long'}   
						 }
					},
					dob: {
						validators: {
							notEmpty: {
								message: 'This is a required field'
							},
							date: {
								format: 'DD-MM-YYYY',
								message: 'The value is not a valid date'
							}
						}
					},
					gender: {
						validators: {
							notEmpty: {
								message: 'This is a required field'
							}
						}
					},
					first_challenge: {
						validators: {
							notEmpty: {
								message: 'This is a required field'
							}
						 }
					},
					how: {
						validators: {
							notEmpty: {
								message: 'This is a required field'
							}
						}
					},
					motivation: {
						validators: {
							notEmpty: {
								message: 'This is a required field'},   
							stringLength: {
									min: 100,
								message: 'This must be over 100 characters long'}   
						}
					},
				}
			});
		});
</script>


 
    
  <!---- Include common Footer    ----->
	<?php include '../includes/footer.html';?>  

    
    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

  </body>
</html>