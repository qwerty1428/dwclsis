<?php 
include 'core/init.php';
include 'includes/overall_header.php';

?>
<div class="row ">
	<form action="register.php" onSubmit="return validate()" name="form1" class="form-horizontal" method="POST">


		<div class="col-md-4"></div>
		<div class="col-md-4 well">
			<h2 class="page-header text-center">Register as Teacher</h2>
			<div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" name="fname"  placeholder="First Name" required  autocomplete="off">
				      <input type="hidden" class="form-control" name="type" value="1">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" name="lname"  placeholder="Last Name" required  autocomplete="off">
				    </div>
				  </div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" name="username"  placeholder="Username" required  autocomplete="off">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" name="password"  onchange="form.repassword.pattern = this.value;" placeholder="Password" required  autocomplete="off">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-3 control-label">Re-type Password</label>
				    <div class="col-sm-7">
				      <input type="password" class="form-control" name="repassword" placeholder="Re-type Password" required required title="Password does not match" autocomplete="off">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" name="submit" class="btn btn-default">Register</button>
				    </div>
				  </div>
					
				</div>

		</div>		
		<div class="col-md-4"></div>
		
	</form>
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