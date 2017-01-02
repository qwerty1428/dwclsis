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
 <div class="panel panel-default" >
      <div class="panel-heading">
        <h3 class="panel-title text-center">Quiz</h3>
       <div class="btn-group" ><a href="create_quiz_question.php" class="btn btn-default" >Create</a></div>
       
      </div>
 <table class="table">
     <tr>
      <th>#</th>
      <th>Group Name</th>
      <th>Quarter</th>
      <th>Date Posted</th>
      <th>Generate Password</th>
      <th>Action</th>

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM quiz_questions WHERE posted_by = '".$user_data['user_id']."' ");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<tr>
                        <td colspan='6'>No Quiz Posted</td>
                      </tr>";
                  }else{
                   while($row1 = mysql_fetch_assoc($results)){
                      $date_posted = $row1['date_posted'];
                      $gid = $row1['gid'];
                      $lid = $row1['lessonid'];
                       $getLesson= mysql_query("SELECT * FROM tbl_lessons WHERE id='$lid'  ");
                      $getGroup= mysql_query("SELECT * FROM tbl_group WHERE gid='$gid'  ");
                      if($gid == 0 )
                      {
                       $groupname="Not yet assigned to a Group";
                      }
                      else{
                        while ($row2 = mysql_fetch_assoc($getGroup)) {
                      $groupname = $row2['gname'];
                      }
                    }
                       while ($row3 = mysql_fetch_assoc($getLesson)) {
                      $lessontitle = $row3['title'];
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
                  <td>#</td>
                  <td>$groupname</td>
                   <td>".$row['qtr']."</td>
                  <td>$count $suffix</td>
                 
                  <td><a href='#' class='btn btn-default'>Generate</a></td>
                  <td><a href='create_quiz_question.php?id=".$row1['id']."' class='btn btn-primary'>Edit</a><a href='delete_quiz.php?id=".$row1['id']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this order?')\" >Delete</a></td>
                  ";



                        }
                  }
          ?>
        </table>
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