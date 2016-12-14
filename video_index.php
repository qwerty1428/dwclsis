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
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title text-center">Videos Posted</h3>
    <div class="btn-group" ><a href="upload_video.php" class="btn btn-default" rel="facebox" >Upload</a></div>
		  </div>
		 <table class="table">
		 <tr>
		 	<th>#</th>
		 	<th>Title</th>
		 	<th>Date Posted</th>
		 	<th>Views</th>

		 </tr>
   			<?php 
		    		$results = mysql_query("SELECT * FROM videos WHERE posted_by=".$user_data['user_id']." ");
                 $colnum=mysql_num_rows($results);
	                if($colnum == 0){
	                    echo "<tr class='well'>
	                     <td colspan='4'> <h3>No video Posted</h3></td>
	                    </tr>";
	                }else{
                    while($row1 = mysql_fetch_assoc($results)){
	                	$date_posted=$row1['date_posted'];
	                	$time=time();
                    $diff = $time - $date_posted;

                    switch (1) {
                      case ($diff < 60):
                         $count = $diff;
                        if($count==0){
                           $count = "a moment";
                         }
                        elseif ($count==1) 
                          {
                          $suffix = "second";
                          }
                        else
                        {
                          $suffix = "seconds";
                        }
                          
                        break;

                    case ($diff > 60 && $diff < 3600 ):
                         $count = floor($diff/60);
                       if ($count==1) 
                          {
                          $suffix = "minute";
                          }
                        else
                        {
                          $suffix = "minutes";
                        }
                          
                        break;

                case ($diff > 3600 && $diff < 86400 ):
                         $count = floor($diff/3600);
                       if ($count==1) 
                          {
                          $suffix = "hour";
                          }
                        else
                        {
                          $suffix = "hours";
                        }
                          
                        break;

              case ($diff > 86400 && $diff <  2629743 ):
                         $count = floor($diff/86400);
                       if ($count==1) 
                          {
                          $suffix = "day";
                          }
                        else
                        {
                          $suffix = "days";
                        }
                          
                        break;

                  case ($diff > 2629743 && $diff < 31556926):
                         $count = floor($diff/2629743);
                       if ($count==1) 
                          {
                          $suffix = "month";
                          }
                        else
                        {
                          $suffix = "months";
                        }
                          
                        break;
                        case ($diff > 31556926):
                         $count = floor($diff/31556926);
                       if ($count==1) 
                          {
                          $suffix = "year";
                          }
                        else
                        {
                          $suffix = "years";
                        }
                          
                        break;
                    }
			                	
		                         echo "<tr>
									<td>#</td>
									<td><a href='watch_video.php?v=".$row1['file_id']."'>".$row1['title']."</a></td>
									<td>$count $suffix</td>
									<td>".$row1['views']."</td>";



		                    }
	                }
		    	?>
  			</table>
		    	
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