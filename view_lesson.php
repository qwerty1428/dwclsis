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

          $lid = $_GET['lid'];
            $results = mysql_query("SELECT * FROM tbl_lessons WHERE id = '$lid' ");
          while($row1 = mysql_fetch_assoc($results)){
          $title =$row1['title'];
           $content =$row1['content'];
          }
      ?>
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo  $title; ?></h3>
   
		  </div>
		    	<div class="panel-body">
              <p><?php echo $content; ?></p>

          </div>
		  </div>
		</div>


</div>

<?php

}else{
	header("location:login-form.php");
}


?>



<?php 
//footer
include "includes/overall_footer.php";
?>