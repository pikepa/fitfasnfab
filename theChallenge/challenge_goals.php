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

<title>My FFF Goals</title>

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


include_once '../mysql/hidden_files/database.php';
include_once '../classes/class.goals.crud.php';
$crud = new crud($conn);
?>
    <div class="wrapper">
       <div class="section-header fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <!-- Remove the .animated class if you don't want things to move -->
              <h1 class="animated slideInLeft"><span>My Goals</span></h1>
            </div>
            <div class="col-md-8">
                <h4>Hi <?php echo userValue(null, "FirstName"); ?>, your Goals are here. </h4>
            </div>
          </div>
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-2">  
                <a href="../mysql/add_goals.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add a Goal</a>
            </div>
            <div class="col-md-8">
            <div class="clearfix"></div>
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th style="width:10%">Timeframe</th>
     <th style="width:40%">Goal</th>
     <th style="width:40%">How</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT * FROM `xff_goals` where `user_id` ='".$_SESSION['uid']."'";       
		$records_per_page=5;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 
</table>
   
       

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
