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
if($user_data['access']== 1){
?>
<div class="col-md-8">
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h1 class="panel-title">User Profile</h1>
   
		  </div>
		    	 <div class="panel-body">
				    <h3>Name: <?php echo $user_data['first_name'].' '.$user_data['last_name'];?></h3>
				    <h3>Email: <?php echo $user_data['email'];?></h3>
				   <a href='change_password.php' class="btn btn-default" rel='facebox'>Change Password</a>
				  </div>
		  </div>
		</div>
</div>
<?php }else{

?>

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