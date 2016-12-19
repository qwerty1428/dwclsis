<?php 
include 'core/init.php';
include 'includes/overall_header.php';

?>
<div class="row ">
	<form action="login.php" name="form1" class="form-horizontal" method="POST">


		<div class="col-md-4"></div>
		<div class="col-md-4 well">
			<h2 class="page-header text-center">Login</h2>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" name="username" id="inputEmail3" placeholder="Email" autocomplete="off">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" name="password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <a href="register_student.php" class="btn btn-primary">Register as Student</a>
				      <a href="register_teacher.php" class="btn btn-default">Register as Teacher</a>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Sign in</button>
				    </div>
				  </div>
					
				</div>

		</div>		
		<div class="col-md-4"></div>
		
	</form>
</div>	