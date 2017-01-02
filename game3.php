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
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Lesson Posted</h3>
   
		  </div>
		    	
		  </div>
		</div>


</div>
<?php }else{

?>
<iframe src="games/science_connect.swf" height="600" width="900" style="border:none;"></iframe>
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