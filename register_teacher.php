<!DOCTYPE html>
<?php 
include 'core/init.php';
include 'includes/overall_header.php';

?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Registration Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/logoUpdated1947.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>DWCL Science Interactive System For Grade 4</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-6 phone">
                    		<img src="assets/img/logoUpdated1947.png" alt="">
                    	</div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Registration for Teacher</h3>
                            		<p><h3>Fill up the form:</h3></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
		            <form action="register.php" onSubmit="return validate()" name="form1" class="form-horizontal" method="POST">
							<div class="form-group">
				   <label for="inputEmail3" class="col-sm-0 control-label">First Name</label>
				
				      <input type="text" class="form-control" name="fname"  placeholder="First Name" required  autocomplete="off">
				      <input type="hidden" class="form-control" name="type" value="1">
			            </div>
                             <div class="form-group">
				    <label for="inputEmail3" class="col-sm-0 control-label">Last Name</label>
				
				      <input type="text" class="form-control" name="lname"  placeholder="Last Name" required  autocomplete="off">
				    	</div>
                        	<div class="form-group">
                    <label for="inputEmail3" class="col-sm-0 control-label">Username</label>
				  
				      <input type="text" class="form-control" name="username"  placeholder="Username" required  autocomplete="off">
                    	</div>
                        	<div class="form-group">
					<label for="inputPassword3" class="col-sm-0 control-label">Password</label>
				   
				      <input type="password" class="form-control" name="password"  onchange="form.repassword.pattern = this.value;" placeholder="Password" required  autocomplete="off">
				    </div>
                    		<div class="form-group">
						<label for="inputPassword3" class="col-sm-0 control-label">Password</label>
				   
				      <input type="password" class="form-control" name="password"  onchange="form.repassword.pattern = this.value;" placeholder="Password" required  autocomplete="off">			    </div>             
				  			<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" name="submit" class="btn btn-default">Register</button>
				    </div>
				  </div>
		             
		                      </form>
		                   </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

<script>
        function validate(){

    if(!document.getElementById("password").value==document.getElementById("confirm_password").value){
    	alert("Passwords do no match");
    }
    return document.getElementById("password").value==document.getElementById("confirm_password").value;
   return false;
    }
    </script>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>