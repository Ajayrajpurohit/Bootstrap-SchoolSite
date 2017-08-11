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
          
  </style>

        <title>Admission | School</title>
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
        <li class="active"><a href="../sub-pages/admission.php">Admission</a></li>
        <li><a href="../sub-pages/events.php">Events</a></li>
        <li><a href="../sub-pages/contact.php">Contact</a></li>
        <li><a href="../sub-pages/about.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
        </nav>
        <div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-10 text-center">
<div class="container" style="padding-top:50px;">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Admission Form</h3>
			 			</div>
			 			<div class="panel-body">
                            <?php 
                            if($_POST){                           
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "School";

                            $fname = $_POST["first_name"];                           
                            $lname = $_POST["last_name"];
                            $moname = $_POST["moname"];
                            $frname = $_POST["frname"];
                            $email = $_POST["email"];
                            $dob = $_POST["dob"];   
                            $class = $_POST["class"];      
                            $lang = $_POST["lang"];
                            $phone = $_POST["phone"];
                            $add = $_POST["add"];
                            $photo = "../school/sub-pages/photo/".$_FILES["photo"]["name"];
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "INSERT INTO admission (first_name, last_name, mother_name, father_name, email, DOB, class,  lang, phone, photo, address)
                            VALUES ('{$fname}', '{$lname}', '{$moname}', '{$frname}', '{$email}', '{$dob}', '{$class}', '{$lang}', '{$phone}','{$photo}', '{$add}')";

                            if ($conn->query($sql) === TRUE) {
                                $fileq = move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/".$_FILES["photo"]["name"]);
                                if($fileq){
                                echo "<font color='green'>Information Submitted Successfully</font>"; 
                                header("Location : http://localhost/school");
                                exit();
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                            $conn->close();
                            }
                            
                             ?> 
			    		<form role="form" method="post" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="moname" class="form-control input-sm" placeholder="Mother's Name">
			    			</div>
                            <div class="form-group">
			    				<input type="text" name="frname" class="form-control input-sm" placeholder="Father's Name">
			    			</div>
                            <div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="dob" class="form-control input-sm" placeholder="DD/MM/YYY" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="number" name="class" class="form-control input-sm" placeholder="Applying For" maxlength="10" required >
			    					</div>
			    				</div>
			    			</div>
                            <div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="text" name="lang" class="form-control input-sm" placeholder="Language Spoken">
			    					</div>
			    				</div>
			    			</div>
                            <div class="form-group">
			    				<input type="number" name="phone" class="form-control input-sm" placeholder="Contact no." required>
			    			</div>
                            <div class="form-group">
			    				<input type="file" name="photo" class="form-control input-sm" placeholder="Photo" required>
			    			</div>
                            <div class="form-group">
			    				<input type="text-box" name="add" class="form-control input-sm" placeholder="Address" required>
			    			</div>
			    			<input type="submit" value="Submit" class="btn btn-info btn-block">
			    		
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