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
        <h3 class="panel-title text-center">LESSONS</h3>
       <div class="btn-group" ><a href="add_lesson.php" class="btn btn-default" >Create</a></div>
       
      </div>
 <table class="table">
     <tr>
      
      <th>Title</th>
      <th>Date Posted</th>
      <th>Quarter</th>
      <th>Group Name</th>
      <th>Action</th>

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM tbl_lessons WHERE posted_by = '".$user_data['user_id']."' ");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<tr>
                      
                        <td colspan='4'>No Lesson Posted</td>
                      </tr>";
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
                       
                   
                        

                             echo "<tr>
             
                  <td>".$row1['title']."</td>
                  <td>$date_posted</td>
                
                  <td>".$row1['qtr']."</td>
                 
                  <td> $groupname</td>
                  <td><a href='add_lesson.php?id=".$row1['id']."' class='btn btn-primary'>Edit</a><a href='delete_lesson.php?id=".$row1['id']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this lesson?')\" >Delete</a></td>
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