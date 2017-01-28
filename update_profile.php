<?php 
include 'core/init.php';
include "includes/overall_header.php";
if(logged_in()== true){
	include "includes/menu_header.php";

?>
<div class="col-xs-6 col-md-4"  >
	<?php 

  include "includes/side-menu.php";
 

  ?>


</div>
<div class="col-xs-12 col-sm-6 col-md-8 content"  >

<?php
if(isset($_GET['msg'])){
echo "<p>".$_GET['msg']."</p>";
} 
if($user_data['access']== 1){
?>
<div class="col-md-8">
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h1 class="panel-title">Update Profile</h1>
   
		  </div>
		    	 <div class="panel-body">
		    	
		<form action="update.php" onSubmit="return validate()" name="form1" class="form-horizontal" method="POST">
				<div class="form-group">
				<div class="col-sm-3">
				<label for="inputEmail3" class="col-sm-0 control-label">First Name</label>
				</div>	
					<div class="col-sm-7">
					<input type="text" class="form-control" name="fname"  placeholder="First Name" required  autocomplete="off">
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-3">
					<label for="inputEmail3" class="col-sm-0 control-label">Last Name</label>	
				</div>	
					<div class="col-sm-7">	
						<input type="text" class="form-control" name="lname"  placeholder="Last Name" required  autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="inputEmail3" class="col-sm-0 control-label">Username</label>       
					</div>	
					<div class="col-sm-7">
						<input type="text" class="form-control" name="usname"  placeholder="Username" required  autocomplete="off">
					</div>
				</div>
				 <div class="form-group">
				 <div class="col-sm-3">
				    <label class="control-label" for="exampleInputPassword3">New Password</label>
				</div> 	
				 	<div class="col-sm-7">   
				    	<input type="password" class="form-control" name="pwd" required onchange="form.pwd2.pattern = this.value;" required placeholder="New Password">
				  	</div>
				  </div>
				  <div class="form-group">
				  <div class="col-sm-3">
				    <label class="control-label" for="exampleInputPassword3">Retype Password</label>
				  </div>  
				    <div class="col-sm-7">
				    	<input type="password" class="form-control" name="pwd2"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Retype Password">
				  	</div>
				  </div>
				<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-default" >Update</button>
					 </div>
				 </div>             
				 </form>

				  </div>
		  </div>
		</div>
</div>

<?php }else{

?>

<div class="col-md-8">
				<div class="panel panel-default">
		  <div class="panel-heading">
		    <h1 class="panel-title">Update Profile</h1>
   
		  </div>
		    	 <div class="panel-body">
		    	
		<form action="update.php" onSubmit="return validate()" name="form1" class="form-horizontal" method="POST">
				<div class="form-group">
				<div class="col-sm-3">
				<label for="inputEmail3" class="col-sm-0 control-label">First Name</label>
				</div>	
					<div class="col-sm-7">
					<input type="text" class="form-control" name="fname"  placeholder="First Name" required  autocomplete="off">
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-3">
					<label for="inputEmail3" class="col-sm-0 control-label">Last Name</label>	
				</div>	
					<div class="col-sm-7">	
						<input type="text" class="form-control" name="lname"  placeholder="Last Name" required  autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="inputEmail3" class="col-sm-0 control-label">Username</label>       
					</div>	
					<div class="col-sm-7">
						<input type="text" class="form-control" name="usname"  placeholder="Username" required  autocomplete="off">
					</div>
				</div>
				 <div class="form-group">
				 <div class="col-sm-3">
				    <label class="control-label" for="exampleInputPassword3">New Password</label>
				</div> 	
				 	<div class="col-sm-7">   
				    	<input type="password" class="form-control" name="pwd" required onchange="form.pwd2.pattern = this.value;" required placeholder="New Password">
				  	</div>
				  </div>
				  <div class="form-group">
				  <div class="col-sm-3">
				    <label class="control-label" for="exampleInputPassword3">Retype Password</label>
				  </div>  
				    <div class="col-sm-7">
				    	<input type="password" class="form-control" name="pwd2"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Retype Password">
				  	</div>
				  </div>
				<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-default">Update</button>
					 </div>
				 </div>             
				 </form>

				  </div>
		  </div>
<?php
	}


}else{
	header("location:login-form.php");
}


?>



<?php 
//footer
include "includes/overall_footer.php";
?>