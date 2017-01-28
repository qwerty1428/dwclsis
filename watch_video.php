<?php 
include 'core/init.php';
include "includes/overall_header.php";
if(logged_in()== true){
	include "includes/menu_header.php";

?>
<div class="col-xs-6 col-md-4"  >
	<?php include "includes/side-menu.php";?>

</div>
<div class="col-xs-12 col-sm-6 col-md-8 content"  >
<?php 
 if(isset($_GET['v'])){
    $id = $_GET['v'];

      $result = mysql_query("SELECT * FROM videos WHERE file_id='$id'");
          while($row = mysql_fetch_assoc($result)){
             $posted_by = $row['posted_by'];
            $thumbnail=$row['thumbnail'];
            

  echo "
          <div class='embed-responsive embed-responsive-16by9'>
              <video width='900' height='600' controls autoplay>
              <source src='".$row['location']."".$row['file_name']."' type='".$row['type']."'>
              Your browser does not support HTML5 video.
              </video>
          </div>
          "; 
          }
             
        }
        else
        {
        echo "ERROR!";
        } 
?>
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