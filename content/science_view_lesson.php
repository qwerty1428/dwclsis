<?php
require 'database/connection.php';
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<?php 
  include "includes/head.php";
?>
<body>
<div class="container">
  <?php 
   include "includes/header.php";
  ?>
  <div class="row">
      <div class="jumbotron" >
          <h1>ENGLISH</h1>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="page-header"><h3>LESSONS</h3></div>
          
              <?php
              $les_id = $_GET['id'];
                    $update = $conn->query("UPDATE tbl_lessons SET `views`=`views` + 1 WHERE id='$les_id' ");
                   $result = $conn->query("SELECT * FROM tbl_lessons WHERE id=' $les_id'");
                if($result->num_rows == 0){
                    echo "<tr>
                      <td colspan='6'>Lesson does not exist</td>
                    </tr>";
                }else{
                while($row = $result->fetch_assoc()){
                  $title = $row['title'];
                  $content = $row['content'];
                  $posted = $row['posted_by'];
                   $subject = $row['subject'];
                  $date_posted = $row['date_posted'];
                  echo "
             
                  <div class='lessons'>
                  <div class='thumbnail'>
                    <div class='caption'>
                      <h3>$title</h3>
                      <p>$content</p>
                    </div>
                  </div>
                 
                </div>

                    ";
                }
              }
           


              ?>
              <h2>Comments</h2>
              <hr />
              <?php
             $comments = $conn->query("SELECT * FROM comments WHERE lesson_id=' $les_id'");
                if($comments->num_rows == 0){
                    echo "<tr>
                      <td colspan='6'>No Comment Posted</td>
                    </tr>";
                }else{
                while($row = $comments->fetch_assoc()){
                  $comment = $row['comment'];
                  $posted = $row['posted_by'];
                   $subject = $row['subject'];
                  $date_posted = $row['date_posted'];

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
             
                  <div class='comment'>
                  <div class='thumbnail'>
                    <div class='caption'>
                      <h4>$posted <br/> <small>$count $suffix ago</small></h4>
                      <p>$comment</p>
                    </div>
                  </div>
                 
                </div>

                    ";
                }
              }


              ?>



          <h2>Leave a Comment</h2>
          <hr />
          <form action="post_comment.php" method="post" name="form1">

              <input class="form-control" type="text" name="name" placeholder="Your Name" required><br />
              <input type="hidden" name="lesson_id" value="<?php echo $les_id?>"><br />
              <textarea name="comment" cols="50" rows="2" required>Please Leave a Comment</textarea><br />
              <input class="btn btn-primary" type="submit" value="Post">
          </form>
           <script>CKEDITOR.replace( 'comment' );</script>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
        <div class="page-header"><h3>Contact Us</h3></div>
    </div>
    <div class="col-md-4">
        <div class="page-header"><h3>About Us</h3></div>
    </div>
    <div class="col-md-4">
        <div class="page-header"><h3>Like Us</h3></div>
    </div>
  </div>
</div>
<?php
include 'includes/footer.php';
?>