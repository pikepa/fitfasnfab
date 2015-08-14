<?php
session_start();

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

<title>The Weeks Work</title>

<!--  Include CSS and Links   ======= -->
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
<?php
        if (!isset($_GET['week_code'])) {
            $week=$_SESSION['week'] ;
        }else{ 
            $_SESSION['week']=$_GET['week_code'];
            $week=$_GET['week_code'];
              }
            
            $link=$con;
    $query = "SELECT * FROM `xff_std_weeks` where `week_code` = '$week'"; 
    $getID = mysqli_fetch_assoc(mysqli_query($link,$query));
    $dispweek=$getID['week'];     
         
      
        // include database connection
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mysql/hidden_files/database.php";
        include_once($path); 
 
        $action = isset($_GET['action']) ? $_GET['action'] : "";
 
        // if it was redirected from delete.php
        if($action=='deleted'){
            echo "<div>Record was deleted.</div>";
        }
 
        // select all data
        $query = "SELECT * FROM xff_wk_messages WHERE week_code= '$week' and type='MES'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // this is how to get number of rows returned

        $num = $stmt->rowCount();

    ?>
    <div class="wrapper">
        <div class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>Weekly Program</span></h1>
            </div>
            <div class="col-md-10">
              <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><span><i class="fa fa-calendar"></i><?php echo " $dispweek" ?> </a></li>
                    <li role="presentation"><a href="challenge_weeks_hwork.php"><span><i class="fa fa-pencil"></i> Homework</a></li>
                    <li role="presentation"><a href="challenge_weeks_exercise.php"><span><i class="fa fa-heartbeat"></i> Exercise Plan</a></li>
                    <li role="presentation"><a href="challenge_weeks_nutrition.php"><span><i class="fa fa-cutlery"></i> Nutrition Plan</a></li>
                    <li role="presentation"><a href="challenge_home.php"><span><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
          </div>
        </div>
    </div>  
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="thumbnail float-left">
                    <img  src="/img/lgfimages/FFF-ProfilePic-222x300.jpg" alt="Profile Pic">
                </div>          
            </div>
            <div class="col-md-10">
             <div Id='home'>
              <div class="table-responsive">
                  <table class="table " border="0">
                  <tr>
                  <th class="fff-color">Hi <?php echo userValue(null, "FirstName"); ?> Welcome to <?php echo " $dispweek" ?></th>
                  <th></th>               
                  </tr>
                    <?php
                     //check if more than 0 record found
                        if($num>0){
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);   // this will make $row['firstname'] to just $firstname only
                    ?>          
                  <tr>
                  <td ><b><?php echo $row['title'] ; ?></b></td>
                  <td></td>
                  </tr>
                  <tr>
                  <td style="border-top:0px;width:60%"><p class="text-justify"> <?php echo $row['message'] ; ?></p></td>
                  <td style="border-top:0px"><?php echo $row['link']; ?></td>
                  </tr>
                   <?php
                    }
                         // if no records found
                    }else{
                     echo "<div>No records found.</div>";
                     }
            ?>       
                    </table>
                   
                   
                   </div>
             </div>
            </div>
        </div>
    </div>


    <!---- Include common Footer    ----->
    <?php include '../includes/footer.html'; ?>  

    <!-- JavaScript
    ================================================== -->
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>

</body>
</html>
