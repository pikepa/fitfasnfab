    <?php 
	// Taken out to remove message under menu session_start();
	

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

    <title>We're Just Doing It</title>

 


	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("/css/main-css.css")
		</style>

    <!--- Local Styling --------->

 
 </head>
  
  <body >
    
     <!---- Include Header    ----->
	<?php  
    include '../includes/menubars.inc.php';
    ?>
      
    <!----- Include Pagee Restrictions -------->
    
    
    <!-- Main body
    ================== -->
<div class=wrapper>  
   <div class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Challenge Information</span></h1>
            </div>
          </div>
        </div>
    </div>  
   <div class="container">
		<div class="row">
         <div class="col-md-2">
          <div id="left_sidemenu">
           <p><a class="btn btn-xs btn-block btn-primary" href="../theChallenge/challenge_weeks.php?week_code=PR01" role="button">Pre-Season Wk1</a></p>
           <p><a class="btn btn-xs btn-block btn-primary" href="../theChallenge/challenge_weeks.php?week_code=PR02" role="button">Pre-Season Wk2</a></p>
           <p><a class="btn btn-xs btn-block btn-primary" href="../theChallenge/challenge_weeks.php?week_code=WK01" role="button">Week 01</a></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 02      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 03      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 04      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 05      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 06      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 07      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 08      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 09      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 10      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 11      </button></p>
           <p> <button type="button" class="btn btn-primary btn-xs btn-block disabled">Week 12      </button></p>



          </div>
         </div> 
         <div class="col-md-8">     
            <h3 class="fff-color">Welcome Back <?php echo userValue(null, "FirstName"); ?></h3>
			<div class="text-left"><h4><?php if(!empty($_SESSION['challenge'])){
				echo "You are registered for the ".$_SESSION['challenge'];
				}else{
				echo "You have not registered for the next Challenge yet.";}?></h4>
			</div>	
            
            
			
              <?php

                $my_user_id = $_SESSION['uid'];

              // $link = mysqli_connect("localhost", "root", "root", "fitfastnfab");// to connect locally 
	 	        $link=$con;    // to connect on live database
                if (mysqli_connect_error()) {

	 	          die("Could not connect to database");

                }
               ?>				
				
	<h4 class="fff-color" style="margin-top:20px">Your Results to-date</h4>

			
              <?php

              //  $my_user_id = $_SESSION['uid'];

              // $link = mysqli_connect("localhost", "root", "root", "fitfastnfab");// to connect locally 
	 	//        $link=$con;    // to connect on live database
                //if (mysqli_connect_error()) {

	 	       //  die("Could not connect to database");

               

                $query = "SELECT * FROM `xff_wandm` WHERE `user_id` ='".$_SESSION['uid']."' ORDER BY date DESC";
	 	
                    if ($result=mysqli_query($link, $query)) { ?>
                            <div class="table-responsive">
                            <table class="table">
                            <tr>
                            <th>Date</th>
                            <th>Weight</th>
                            <th></th>
                            <th>Chest</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>L.Thigh</th>
                            <th>R.Thigh</th>
                            <th></th>
                            
                            </tr>

                                    <?php
                                        foreach ($result as $subAray)
                                            {
                                            $newdate=implode('-', array_reverse(explode('-', $subAray['date'])));
                                    ?>
                                    <tr>
                                    <td><?php echo $newdate; ?></td>
                                    <td><?php echo $subAray['weight'] ; ?></td>
                                    <td><?php echo $subAray['wgt_type']; ?></td>
                                    <td><?php echo $subAray['chest']; ?></td>
                                    <td><?php echo $subAray['waist']; ?></td>
                                    <td><?php echo $subAray['hips']; ?></td>
                                    <td><?php echo $subAray['left_thigh']; ?></td>
                                    <td><?php echo $subAray['right_thigh']; ?></td>
                                    <td><?php echo $subAray['meas_type']; ?></td>

                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </table>
                            </div>
			<?php 
			     } else {

	 	         echo "It failed";
                    }
                ?>
       <h4 class="fff-color" style="margin-top:20px">Your Fitness Test Results</h4>
                                      <?php


              // $link = mysqli_connect("localhost", "root", "root", "fitfastnfab");// to connect locally 
	 	 //       $link=$con;    connection established in first sectione
                if (mysqli_connect_error()) {

	 	          die("Could not connect to database");

                }

                $query = "SELECT * FROM `xff_fitness_results` WHERE `user_id` ='".$_SESSION['uid']."' ORDER BY date DESC";
	 	
                    if ($result=mysqli_query($link, $query)) { ?>
                            <div class="table-responsive">
                            <table class="table">
                            <tr>
                            <th>Date</th>
                            <th>1Km Time Trial(Mins)</th>
                            <th>Plank Hold (Mins)</th>
                            <th>Push Ups (in 1 Min)</th>
                            <th>Wall Sit (Mins)</th>
                            
                            
                            </tr>

                                    <?php
                                        foreach ($result as $subAray)
                                            {
                                            $newdate=implode('-', array_reverse(explode('-', $subAray['date'])));
                                    ?>
                                    <tr>
                                    <td><?php echo $newdate; ?></td>
                                    <td><?php echo $subAray['timetrial'] ; ?></td>
                                    <td><?php echo $subAray['plankhold']; ?></td>
                                    <td><?php echo $subAray['pushups']; ?></td>
                                    <td><?php echo $subAray['wallsit']; ?></td>


                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </table>
                            </div>
			<?php 
			     } else {

	 	         echo "It failed";
                    }
                ?>

          </div>
                    <div class="col-md-2">
<?php 
                        if (is_admin()) { 
                        echo '<p><a class="btn btn-xs btn-block btn-danger" href="../theChallenge/challenge_admin.php" role="button">Admin</a></p>' ; }?>
                       <p><a class="btn btn-xs btn-block btn-pink" href="../theChallenge/challenge_updt_wandm.php" role="button"> Enter Weekly Results</a></p>
                       <p><a class="btn btn-xs btn-block btn-pink" href="../theChallenge/challenge_fitness_test.php" role="button"> Fitness Test Results</a></p>
                       <p><a class="btn btn-xs btn-block btn-pink" href="../theChallenge/challenge_goals.php" role="button"> My Goals</a></p>
                    </div>
             </div>
    </div><!-- /.container -->
  </div> <!-- Wrapper -->
      
 

  <!---- Include common Footer    ----->
	<?php include '../includes/footer.html';?>  

   
    
    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>
    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
  </body>
</html>