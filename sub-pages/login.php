<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images/favicon.jpg">
      <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    #footer {
      background-color: #555;
      color: white;
      padding: 15px;
        text-align: center;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
                 .centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
          #bd{
              background-color: darkgrey;
          }
  </style>

        <title>Login | School</title>
    </head>
    <body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.html">SCHOOL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../sub-pages/admission.php">Admission</a></li>
        <li><a href="../sub-pages/events.php">Events</a></li>
        <li><a href="../sub-pages/contact.php">Contact</a></li>
        <li><a href="../sub-pages/about.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
        </nav>
        <div class="container-fluid text-center" id="bd">
  <div class="row content">
    <div class="col-sm-10 text-left">
      <div class="container" style="padding-top:50px;">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Welcome Back</h3>
			 			</div>
			 			<div class="panel-body">
                            <?php
                            $server = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $dbase = 'School';
                            $db = mysqli_connect($server,$user,$pass,$dbase);
                            session_start();
                            
                            if($_SERVER["REQUEST_METHOD"]=="POST");
                            {
                            $user_email = mysqli_real_escape_string($db,$_POST['email']);
                            $user_pass = mysqli_real_escape_string($db,$_POST['password']);
                            
                            $sql = "SELECT ID FROM students WHERE email='$user_email' and password='$user_pass'";
                            
                            $result = mysqli_query($db,$sql);
                            $row = mysqli_fetch_array($result);
                            $active = $row['active'];
                            $count = mysqli_num_rows($result);
                            if($count == 1){
                                $_SESSION['login_user'] = $user_email;
                                header("location : dash.php");
                                
                            }
                                else{
                                    $error = "Your Login Credentials are invalid";
                                }
                            }
                            ?>
			    		<form role="form" action="" method="post">
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    			<input type="submit" value="Login" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    </div>
        <?php include 'sidebar.html' ?>
        <p id="footer">All rights reserved.</p>
</body>
</html>