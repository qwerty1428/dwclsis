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
        <h3 class="panel-title text-center">Quiz Question</h3>
         <?php $id = $_GET['qgid']; ?>

       <div class="btn-group" ><a href="create_quiz_question.php?qgid=<?php echo $id;?>" class="btn btn-default"  >Create</a></div>
       
      </div>
 <table class="table">
     <tr>
     
      <th>Questions</th>
      <th>Group Name</th>
      <th>Date Posted</th>

      <th>Action</th>

     </tr>
        <?php 
            $results = mysql_query("SELECT * FROM questions WHERE qgid = '".$_GET['qgid']."'");
                 $colnum=mysql_num_rows($results);
                  if($colnum == 0){
                      echo "<tr>
                        <td colspan='6'>No Quiz Posted</td>
                      </tr>";
                  }else{
                   while($row1 = mysql_fetch_assoc($results)){
                     $name = $row1['question'];
                      $date_posted=$row1['date_posted'];
                     $results2 = mysql_query("SELECT * FROM tbl_group WHERE gid = '".$_GET['qgid']."'");
                    while($row2 = mysql_fetch_assoc($results2)){
                      $gid=$row2['gname'];
                    }

                  echo "<tr>
               
                  <td>$name</td>
                   <td>$gid</td>
                  <td>$date_posted</td>
                  <td><a href='create_quiz_question.php?id=".$row1['id']."' class='btn btn-primary'>Edit</a></td>
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