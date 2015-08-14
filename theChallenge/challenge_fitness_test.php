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


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Fitness Test</title>

 
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
      <div class="section-header">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
      
<h4 style="margin-bottom:50px">Hi <?php echo userValue(null, "FirstName"); ?>, let's register your Fitness Test Results.</h4>

<form id="collect_fitness_results" class="form-horizontal" method="post" action="../mysql/submit_fitness_test.php" >
       <div class="form-group">
        <label class="col-sm-3 control-label">Date</label>
        <div class="col-md-5">
        <input type="date" class="form-control"  name="up_date" placeholder="ddmmyyyy">
        </div>
        </div>
 

      <div class="form-group">
        <label  class="col-sm-3 control-label">1Km Time Trial</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" name="timetrial" placeholder="0.0">
        </div>
        </div>
    
      <div class="form-group">
        <label class="col-sm-3 control-label">Plank Hold</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" name="plankhold" placeholder="0.0">
        </div>
        </div>
      <div class="form-group">
        <label for="inputhips" class="col-sm-3 control-label">1Min P/Ups</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="hips" name="minpups" placeholder="0.0">
        </div>
        </div>
       <div class="form-group">
        <label class="col-sm-3 control-label">Wall Sit</label>
        <div class="col-sm-3">
        <input type="text" class="form-control"  name="wallsit" placeholder="0.0">
        </div>
        </div>
       <div class="form-group">
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
      </div>
  
<script>
$(document).ready(function() {
    $('#collect_fitness_results').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            up_date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    }
                }
            },
             timetrial: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
           plankhold: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            minpups: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            wallsit: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            }
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
