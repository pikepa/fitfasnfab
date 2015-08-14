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

    <title>Submit Weight</title>

 
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
            <div class="col-md-6 col-md-offset-3">
      
<h4 style="margin-bottom:50px">Hi <?php echo userValue(null, "FirstName"); ?>, let's update Your Weight and Measurements</h4>

<form id="collect_wandm" class="form-horizontal" method="post" action="../mysql/submit_weight.php" >
       <div class="form-group">
        <label class="col-sm-3 control-label">Date</label>
        <div class="col-md-5">
        <input type="date" class="form-control"  name="up_date" placeholder="yyyy-mm-dd">
        </div>
        </div>
 
    
    <div class="form-group">
        <label class="col-sm-3 control-label">Units</label>
        <div class="col-sm-4">
           <select class="form-control" name="wgt_type" >
                <option value="">Units</option>
                <option value="Kgs">Kgs</option>
                <option value="lbs">lbs</option>
            </select>
            </div>
            </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">Weight</label>
        <div class="col-sm-3">
        <input type="num" class="form-control" name="weight" placeholder="0.000">
        </div>
        </div>  
    
    
        <div class="form-group">
        <label class="col-sm-3 control-label">Cms/Inches</label>
        <div class="col-sm-4">
            <select class="form-control" name="meas_type">
                <option value="">Units</option>
                <option value="cms">cms</option>
                <option value="inches">inches</option>
            </select>
         </div>
         </div>
      <div class="form-group">
        <label  class="col-sm-3 control-label">Chest</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" name="chest" placeholder="0.0">
        </div>
        </div>
    
      <div class="form-group">
        <label class="col-sm-3 control-label">Waist</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" name="waist" placeholder="0.0">
        </div>
        </div>
      <div class="form-group">
        <label for="inputhips" class="col-sm-3 control-label">Hips</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="hips" name="hips" placeholder="0.0">
        </div>
        </div>
       <div class="form-group">
        <label class="col-sm-3 control-label">R.Thigh</label>
        <div class="col-sm-3">
        <input type="text" class="form-control"  name="right_thigh" placeholder="0.0">
        </div>
        </div>
       <div class="form-group">
        <label class="col-sm-3 control-label">L.Thigh</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" id="left_thigh" name="left_thigh" placeholder="0.0">
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
    $('#collect_wandm').formValidation({
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
            weight: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            wgt_type: {
                validators: {
                    notEmpty: {
                        message: 'The Units are required'
                    }
                }
            },
            weight: {
                validators: {
                    notEmpty: {
                        message: 'Weight is required'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            meas_type: {
                validators: {
                    notEmpty: {
                        message: 'The Units are required'
                    }
                }
            },
            chest: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            waist: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            hips: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            left_thigh: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
                }
            },
            right_thigh: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    numeric: {
                        message: 'Must be a number'
                    }
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
