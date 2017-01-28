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
		    <h3 class="panel-title">Group Created</h3>
		  </div>
		  <table class="table">
     <tr>
      
      <th>Group Name</th>
      <th>Date Posted</th>
      <th>Password</th>
      <th>No of Student Joined</th>
     

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM tbl_group WHERE created_by='".$user_data['user_id']."' ");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<tr >
                        <td colspan='4'>No Group Posted</td>
                      </tr>";
                  }else{
                   while($row1 = mysql_fetch_assoc($results)){
                      $date_posted = $row1['date_created'];
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
                       $countstudent = mysql_query("SELECT * FROM student_group WHERE gid ='".$row1['gid']."'"); 
                       $numstudent = mysql_num_rows($countstudent);
                             echo "<tr>
                  
                  <td>".$row1['gname']."</td>
                  <td>$count $suffix</td>
                
                  <td>".$row1['gpassword']."</td>
                  <td>$numstudent</td>
                 
                  ";



                        }
                  }
          ?>
        </table>
		</div>
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Lesson Posted</h3>
   
		  </div>
		    <table class="table">
     <tr>

      <th>Title</th>
      <th>Date Posted</th>
      <th>Quarter</th>
      <th>Group Name</th>
  

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM tbl_lessons WHERE posted_by = '".$user_data['user_id']."' ORDER BY date_posted DESC LIMIT 5 ");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<div class='well'>
                        <h3>No Lesson Posted</h3>
                      </div>";
                  }else{
                   while($row1 = mysql_fetch_assoc($results)){
                      $date_posted = $row1['date_posted'];
                      $gid = $row1['gid'];
                      $getGroup= mysql_query("SELECT * FROM tbl_group WHERE gid='$gid'  ");
                      if($gid == 0 )
                      {
                       $groupname="No Group assigned";
                      }
                      else{
                        while ($row2 = mysql_fetch_assoc($getGroup)) {
                      $groupname = $row2['gname'];
                    }
                      }
                       
                    
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
                  <td>".$row1['title']."</td>
                  <td>$count $suffix</td>
                
                  <td>".$row1['qtr']."</td>
                 
                  <td> $groupname</td>
                  ";



                        }
                  }
          ?>
        </table>	
		  </div>
		  <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Video Posted</h3>
   			
		  </div>
		   <table class="table">
		 <tr>
		 	
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
									
									<td><a href='watch_video.php?v=".$row1['file_id']."'>".$row1['title']."</a></td>
									<td>$count $suffix</td>
									<td>".$row1['views']."</td>";



		                    }
	                }
		    	?>
  			</table>
			</div>
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Quiz Posted</h3>
		  </div>
      <table class="table">
     <tr>
      <th>#</th>
      <th>Quiz Name</th>
      <th>Quarter</th>
      <th>Date Posted</th>
      <th>Generated Password</th>
      <th>Action</th>

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM quiz_group WHERE posted_by = '".$user_data['user_id']."'");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<tr>
                        <td colspan='6'>No Quiz Posted</td>
                      </tr>";
                  }else{
                   while($row1 = mysql_fetch_assoc($results)){
                     $name = $row1['name'];
                      $date_posted=$row1['date_created'];
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
                  <td>$name</td>
                   <td>".$row1['qtr']."</td>
                  <td>$count $suffix</td>
                  <td>".$row1['password']."</td>
                  <td><a href='#' class='btn btn-primary'>Edit</a><a href='delete_quiz.php?id=".$row1['qgid']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this quiz?')\" >Delete</a></td>
                  ";



                        }
                  }
          ?>
        </table>
		</div>
</div>
<?php }else{

?>
<div class='panel panel-default'>
                    <div class='panel-heading'>
                      <h3 class='panel-title text-center'>Group Joined</h3>
                    </div>
                    <table class="table">
                      <tr>
                          <td>Group Name</td>    
                          <td>Number of Members</td>    

                      </tr>
  
    <?php $checkStud=mysql_query("SELECT * FROM student_group WHERE sid = ".$user_data['user_id']." ");
    $countGroup = mysql_num_rows($checkStud);
    while($row = mysql_fetch_assoc($checkStud)){
     $gid = $row['gid'];
      $getGroupname=mysql_query("SELECT * FROM tbl_group WHERE gid='$gid' ");
      $numGroupMem=mysql_query("SELECT * FROM student_group WHERE gid='$gid' ");
      $countGroupMem = mysql_num_rows($numGroupMem);
       while($row1 = mysql_fetch_assoc( $getGroupname)){
         $gname = $row1['gname'];

        if ($countGroup==0) {

            $group ="<tr>
    <td colspan='2'>You have not joined a group</td>
  </tr>";
          }else{
              echo $group = " 
                      <tr>
                        <td>$gname</td>
                        <td> $countGroupMem</td>
                      </tr>
                    ";

          }
       }
    }
   echo "</table>
</div> ";
?>
<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Lesson Posted</h3>
   
      </div>
        <table class="table">
     <tr>

      <th>Title</th>
      <th>Date Posted</th>
      <th>Quarter</th>
  

     </tr>

          <?php
           $results = mysql_query("SELECT * FROM tbl_lessons WHERE posted_by = '".$user_data['user_id']."' ORDER BY date_posted DESC LIMIT 5 ");
                           $colnum=mysql_num_rows($results);
                            if($colnum == 0){
                                echo "<tr>
                                  <td colspan='3'>No Lesson Posted</td>
                                </tr>";
                            }else{
                             while($row1 = mysql_fetch_assoc($results)){
                                         echo "<tr>
                            <td>".$row1['title']."</td>
                            <td>$count $suffix</td>
                          
                            <td>".$row1['qtr']."</td>

                            ";
                             }
                        }
          ?> 
</table>
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