
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">Fit Fast-n-Fab</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/pages/about-us.php">About Me</a></li>

                <li class="dropdown">   <!-- Start of Dropdown -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        The Challenge<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="../pages/info-how.php">How it Works</a></li>
                     <li><a href="../pages/challenge-pricing.php">Pricing</a></li>
                     <li><a href="../pages/challenge-pricing.php">Register Now</a></li>

                    </ul> 
                </li> <!-- End of Dropdown -->
                <li><a href="../pages/testimonials.php">Testimonials</a></li>
                <li><a href="#pete">Shop</a></li>
                <li><a href="#pete">Blog</a></li>
                <li><a href="../theChallenge/challenge_home.php">Just Let's Do it</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
                                            <!-- Sign out -->
                <li><a href="../login/profile.php"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> My Profile</a></li>
                <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sign Out</a></li>
                <!-- Show admin panel tab if the user is admin  --->
                <?php
				if(is_admin()) {
				?>
				<li><a href='<?php echo $script_path; ?>controlpanel.php'><?php echo $m['admin_panel']; ?></a></li>
				<?php
				}
				?>
                </ul>
            </ul>
        </div>
    </div>
</div>
