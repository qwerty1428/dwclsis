<?php 
include 'core/init.php';
include "includes/overall_header.php";
if(logged_in()== true || $user_data['access']== 2){
	include "includes/menu_header.php";

?>
<div class="col-xs-6 col-md-4"  >
	<?php 

  include "includes/side-menu.php";
 

  ?>


</div>

<div class="col-xs-12 col-sm-6 col-md-8 content"  >

<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Lesson Posted</h3>
   
		  </div>
		 <table class="table">
		 <tr>
		 	<th>#</th>
		 	<th>Title</th>
		 	<th>Date Posted</th>
		 	<th>Views</th>

		 </tr>
   			<?php 
        $grpid = $_GET['gid'];
		    		$results = mysql_query("SELECT * FROM tbl_lessons WHERE gid = '$grpid' ");
                 $colnum=mysql_num_rows($results);
	                if($colnum == 0){
	                    echo "<div class='well'>
	                      <h3>No Lesson Posted</h3>
	                    </div>";
	                }else{
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
			                	while($row1 = mysql_fetch_assoc($results)){
		                         echo "<tr>
									<td>#</td>
									<td><a href='view_lesson.php?lid=".$row1['id']."'>".$row1['title']."</a></td>
									<td>$count $suffix</td>
									<td>".$row1['views']."</td>";



		                    }
	                }
		    	?>
  			</table>
		    	
		  </div>

<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Videos Posted</h3>
   
      </div>
    <div class="panel-body">
         <div class="row">
        <?php 
            $results = mysql_query("SELECT * FROM videos WHERE gid = '$grpid' ");
                 
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
                        

 

                             echo "
                                   <div class='col-sm-6 col-md-4'>
                                      <div class='thumbnail'>
                                      <a href='watch_video.php?v=".$row1['file_id']."'>
                                        <img src='".$row1['thumbnail']."' alt='...' />
                                        </a>
                                        <div class='caption'>
                                          <h3>".$row1['title']."</h3>
                                          $count $suffix
                                        </div>
                                      </div>
                                    </div>


                             <tr>";
                        }
          ?>
            </div>
        </div>   
</div>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Quiz</div>

  <!-- Table -->
  <table class="table">
  <tr>
    <td>#</td>
    <td>Quiz No:</td>
    <td>Posted By:</td>

  </tr>
  <?php 
    $getquiz = mysql_query("SELECT * FROM quiz_questions WHERE gid='$grpid' ");
    while($row2 = mysql_fetch_assoc($getquiz)){
       $getID = $row2['id'];
      echo "<tr>
            <td>&nbsp;</td>
            <td><a href='quiz.php?question=$getID'>Quiz</a></td>
            <td>&nbsp;</td>
      </tr>
      ";

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