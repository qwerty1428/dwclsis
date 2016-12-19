<?php 

if($user_data['access']== 1){
  echo "
<div class='thumbnail' id='user-menu'>
      <img src='img/prof_pic/def.png' id='prof_pic'>
      <div class='caption'>
        <h3 class='text-center'>".$user_data['first_name'] ." ".$user_data['last_name']."</h3>
        <div class='nav nav-pills nav-stacked user-nav' role='group' aria-label='...'>
      <li role='presentation' class='active'><a href='#' class='btn btn-primary' role='button'>Profile</a> </li>
      <li ><a href='group_index.php' class='btn btn-default' role='button'>Group</a></li>
      <li ><a href='lesson_index.php' class='btn btn-default' role='button'>Lessons</a></li>
      <li ><a href='video_index.php' class='btn btn-default' role='button'>Trivia Video</a></li>
      <li ><a href='quiz_index.php' class='btn btn-default' role='button'>Quizzes</a></li>
    </div>
        
      </div>
    </div>";
  }else{
    $checkStud=mysql_query("SELECT * FROM student_group WHERE sid = ".$user_data['user_id']." ");
    $countGroup = mysql_num_rows($checkStud);
    while($row = mysql_fetch_assoc($checkStud)){
      $gid = $row['gid'];
      $getGroupname=mysql_query("SELECT gname FROM tbl_group WHERE gid='$gid' ");
       while($row1 = mysql_fetch_assoc(  $getGroupname)){
        $gname = $row1['gname'];
       }
    }
    if ($countGroup==0) {
      $group ="You have not joined a group";
    }else{
       $group = "<a href='student_group_page.php?gid=$gid'>$group</a>";
    }
    echo "<div class='thumbnail' id='user-menu'>
      <img src='img/prof_pic/def.png' id='prof_pic'>
      <div class='caption'>
        <h3 class='text-center'>".$user_data['first_name'] ." ".$user_data['last_name']."</h3>
        <div class='nav nav-pills nav-stacked user-nav' role='group' aria-label='...'>
      <li role='presentation' class='active'><a href='#' class='btn btn-primary' role='button'>Profile</a> </li>
      
         <li role='presentation' class='active'><a href='group_password.php' rel='facebox' class='btn btn-success'>Enter Password</a></li>
      </div>
      <br />
      <div class='panel panel-default'>
              <div class='panel-heading'>
                <h3 class='panel-title'>Group Joined</h3>
              </div>
              <div class='panel-body'>
               <h3 class='text-center'>$group</h3>
              
              </div>
            </div>

          </div>
    </div>";
  }
?>
