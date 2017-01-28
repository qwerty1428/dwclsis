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
		    <h1 class="panel-title">User Profile</h1>
   
		  </div>
		    	 <div class="panel-body">
		    	 <?php
			      $profile = mysql_query("SELECT profile_pic FROM users WHERE user_id ='".$user_data['user_id']."' ");
			      while($row=mysql_fetch_assoc($profile)){
			        	 $pic = $row['profile_pic'];
			        }
			      if($pic==""){

			       
			           
			      
			         echo "<center>
			        <div class='panel panel-default'>
			          <div class='panel-body'>
			          <img src='img/prof_pic/def.png' height='150px' widht='150px' class='img ' />
			          </div>
			        </div>

			        </center>";
			        
			      }else{
			      	 
			       echo "<center>
			        <div class='panel panel-default'>
			          <div class='panel-body'>
			          <img src='$pic' height='150px' widht='150px' class='img' />

			              <form action='upload_prof_pic.php' method='POST' enctype='multipart/form-data'>
			              <h3>Update Profile Picture</h3>
			              <input type='file' name='prof_pic' class='form-control' /><br />
			              <input type='submit' name='submit' class='btn btn-primary' value='Upload'/>
			              </form>
			          </div>
			        </div>

			        </center>";
			      }

			  ?>
				    <h3>Name: <?php echo $user_data['first_name'].' '.$user_data['last_name'];?></h3>
				   <a href='update_profile.php' class="btn btn-default">Change Password</a>
				  </div>
		  </div>
		</div>
</div>

<?php }else{

?>

<div class="col-md-8">
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h1 class="panel-title">User Profile</h1>
   
		  </div>
		    	 <div class="panel-body">
				    <h3>Name: <?php echo $user_data['first_name'].' '.$user_data['last_name'];?></h3>
				    <h3>Email: <?php echo $user_data['email'];?></h3>
				   <a href='update_profile.php' class="btn btn-default">Change Password</a>
				  </div>
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