


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Sign In</title>

  
	<!--  Include CSS and Links   ======= -->
		<style type="text/css">
			@import url("../css/main-css.css")
		</style>

		<link type="text/css"
 			 id="snipcart-theme"
 			 href="https://cdn.snipcart.com/themes/base/snipcart.min.css" 
  			rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  
 <body>

    <!--  Include Navbar   ======= -->
    
    <?php include '../includes/navbar.html';?>
    

    <!-- Main body
    ================== -->
    <div class="wrapper">
      <!-- Page tip -->
      <div class="page-tip animated slideInDown">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <p>Please sign in before you proceed. If you are not a member, <a href="sign-up.html">create an account</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6">
            <h3 class="hl top-zero">Sign in to fitfastnfab.com</h3>
            <hr>
            <p>Our site will support several methods to verify your identity, for the moment please sign in using email and password to get instant access to all of our features.</p>
            <!-- Social icons -->
            <div class="login-social">
              <ul>
                <li id="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li id="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li id="google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- Login Box -->
          <div class="col-md-4 col-sm-6">
            <div class="form-box">
              <h4>Sign In</h4>
              <hr>
              <form role="form" method="post">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
                <input type="submit" name="submit" value="Sign Up" class="btn btn-green">Submit</input>
               <!-----<button type="submit" value="Sign Up" class="btn btn-green">Submit</button>  ----->
                  
              </form>
              <hr>
              <!-- Sign up link -->
              <p>Not registered? <a href="sign-up.html">Create an Account.</a></p>

              <!-- Lost password form -->
              <p>
                Lost your password? <a href="#lost-password__form" data-toggle="collapse" aria-expanded="false" aria-controls="lost-password__form">Click here to recover.</a>
              </p>
              <div class="collapse" id="lost-password__form">
                <p class="text-muted">
                  Enter your email address below and we will send you a link to reset your password.
                </p>
                <form class="form-inline" role="form">
                  <div class="form-group">
                    <label class="sr-only" for="lost-password__email">Email address</label>
                    <input type="email" class="form-control" id="lost-password__email" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-blue">Send</button>
                </form>
              </div> <!-- lost-password__form -->
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Include Foooter ========= -->

    
    <?php include '../includes/footer.html';?>
    

    
    <!-- JavaScript
    ================================================== -->
    
    <!-- JS Global -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <!-- JS Plugins -->
    <script src="../js/scrolltopcontrol.js"></script>
    
    <!-- JS Custom -->
    <script src="../js/custom.js"></script>
  
      
   </body>
</html>
