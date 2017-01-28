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
       
       <div class="btn-group" ><a href="create_quiz.php" class="btn btn-default" rel='facebox' >Create Quiz</a></div>
       
      </div>
 <table class="table">
     <tr>
     
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
                    

                  echo "<tr>
               
                  <td>$name</td>
                   <td>".$row1['qtr']."</td>
                  <td>$date_posted</td>
                  <td>".$row1['password']."</td>
                  <td><a href='question_list.php?qgid=".$row1['qgid']."' class='btn btn-primary'>Edit</a><a href='delete_quiz.php?id=".$row1['qgid']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this quiz?')\" >Delete</a></td>
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