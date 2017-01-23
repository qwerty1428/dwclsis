<div class='thumbnail' id='user-menu'>
      <img src='img/prof_pic/def.png' id='prof_pic'>
      <div class='caption'>
        <h3 class='text-center'><?php echo $user_data['first_name']." ".$user_data['last_name']; ?></h3>
<?php 

if($user_data['access']== 1){
 echo $menu="<div class='nav nav-pills nav-stacked user-nav' role='group' aria-label='...'>
      <li ><a href='group_index.php' class='btn btn-default' role='button'>Group</a></li>
      <li ><a href='lesson_index.php' class='btn btn-default' role='button'>Lessons</a></li>
      <li ><a href='video_index.php' class='btn btn-default' role='button'>Trivia Video</a></li>
      <li ><a href='quiz_index.php' class='btn btn-default' role='button'>Quizzes</a></li>
    </div>";
 }else{
  echo $menu = "
        <div class='nav nav-pills nav-stacked user-nav' role='group' aria-label='...'>
      <li role='presentation' class='active'><a href='#' class='btn btn-primary' role='button'>Profile</a> </li>
      
         <li role='presentation' class='active'><a href='group_password.php' rel='facebox' class='btn btn-success'>Enter Password</a></li><br /> 
      ";

echo "<div class='panel panel-default'>
                    <div class='panel-heading'>
                      <h3 class='panel-title text-center'>Group Joined</h3>
                    </div>
                    <div class='panel-body'>";
    $checkStud=mysql_query("SELECT * FROM student_group WHERE sid = ".$user_data['user_id']." ");
    $countGroup = mysql_num_rows($checkStud);
    while($row = mysql_fetch_assoc($checkStud)){
     $gid = $row['gid'];
      $getGroupname=mysql_query("SELECT * FROM tbl_group WHERE gid='$gid' ");
       while($row1 = mysql_fetch_assoc( $getGroupname)){
         $gname = $row1['gname'];

        if ($countGroup==0) {

            $group ="<div class='panel-body'>
    You have not joined a group
  </div>";
          }else{
              echo $group = " 
                  
                      <h3 class='text-center'><a href='student_group_page.php?gid=$gid'>$gname</a> </h3>
                    ";

          }
       }
    }
   echo "</div>
</div> ";
   
  }
?>


        
      </div>
    </div>
</div>
