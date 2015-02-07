<?php

session_start();


if(isset($_POST['userid']) && isset($_POST['password'])) {

	require_once('DatabaseControl/DB_Access.php');

    $userid = trim($_POST['userid']);
    $user_password = $_POST['password'];

    $dba = new DB_Access();
    $username = $dba->login($userid,$user_password);

    if($username != 'Error'){
        $_SESSION['username'] = $username[0];
        $_SESSION['user_id'] = $userid;

    }
}

?>

<!DOCTYPE html>

<html>
	<head>
		
		
		<title></title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
	</head>
	<body>

			

		<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
      
      <div class="modal-body">

          <form method="POST" action="">
       
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">User ID</label>
              <div class="controls">
                <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="User Name" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="password" name="password" class="form-control" type="password" placeholder="Password" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="submit" method class="btn btn-success">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
</div>


	
<div class="container" id="main">

	<div class="navbar navbar-fixed-top" id="navigation">

			
	<div class="container">
		
		<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
		<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	
		<a class="navbar-brand" href="/"><img src="images/logo.png" alt="Your Logo"></a>
		
		<div class="nav-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="#">Home</a>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Files <strong class="caret"></strong></a>
					
					<ul class="dropdown-menu">
						<li>
							<a href="#">Upload Files</a>
						</li>
						
						<li>
							<a href="#">Download Files</a>
						</li>
						
						<li>
							<a href="#">Give Permissions</a>
						</li>

					</ul><!-- end dropdown-menu -->
				</li>
			</ul>

				<ul class="nav navbar-nav pull-right">
					<?php if(isset($_SESSION['username'])): ?>
							<li class="dropdown open"> 
		                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                			<i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
				                <ul class="dropdown-menu">
				                    <li>
				                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				                    </li>
				                </ul>
				            </li>
							
					<?php else: ?>	

							<li class="dropdown">
								<a href="#myModal" class="dropdown-toggle" data-toggle="modal">
									<span class="glyphicon glyphicon-user"></span>Login
									<strong class="caret"></strong>
								</a>
							</li>	
								
				        <?php endif; ?>
						</ul><!-- end nav pull-right -->


		</div><!-- end nav-collapse -->
	
	</div><!-- end container -->

		
	</div><!-- end navbar -->
	
	
	

	
	
	<div class="row" id="bigCallout">

	</div><!-- end row -->
	
	
	<div class="row" id="featuresHeading">
	<div class="col-12">
		<h2>Welcome To Research Management System</h2>
		
	</div><!-- end col-12 -->
</div><!-- end featuresHeading -->


<div class="row" id="features">
	<div class="col-sm-4 feature">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">View Your Research Data</h3>
			</div><!-- end panel-heading -->
			<img src="images/fea1.jpg" alt="HTML5" class="img-circle">
			
			<p>are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on</p>
			
			<a href="#" target="#" class="btn btn-warning btn-block">GO</a>
		</div><!-- end panel -->
	</div><!-- end feature -->
	
	<div class="col-sm-4 feature">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Share Research Files</h3>
			</div><!-- end panel-heading -->
			<img src="images/fea2.jpg" alt="CSS3" class="img-circle">
			
			<p>are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on</p>
			
			<a href="#" target="#" class="btn btn-danger btn-block">GO</a>
		</div><!-- end panel -->
	</div><!-- end feature -->
	
	<div class="col-sm-4 feature">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Get Additional Space</h3>
			</div><!-- end panel-heading -->
			<img src="images/fea3.jpg" alt="Bootstrap 3" class="img-circle">
			
			<p>are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on</p>
			
			<a href="#" target="#" class="btn btn-info btn-block">GO</a>
		</div><!-- end panel -->
	</div><!-- end feature -->
</div><!-- end features -->
	
	
	<div class="row" id="moreInfo">

	</div><!-- end row -->
	
	
	<div class="row" id="moreCourses">
		
	</div><!-- end row -->
	
</div><!-- end container -->


<footer>

	<div class="container">
		<div class="row">
			<div class="col-sm-6" id="copyRights">
			<h6>All Rights Reserved</h6>
			</div><!-- end col-sm-6 -->
			
		
			<div class="col-sm-6 pull-right" id = "follow">
				<h6>Follow Us on <a href="www.facebook.com">Facebook</a></h6>
				
			</div><!-- end col-sm-6 -->
			
		
		</div><!-- end row -->
	</div><!-- end container -->
	
</footer>
	

	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	</body>
</html>

