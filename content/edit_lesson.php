<?php require '../database/connection.php';?>
  <?php 
  $les_id=$_GET['id'];
                $result = $conn->query("SELECT * FROM tbl_lessons WHERE id='$les_id'");
                if($result->num_rows == 0){
                    echo "<tr>
                      <td colspan='6'>No Lesson Posted</td>
                    </tr>";
                }else{
                while($row = $result->fetch_assoc()){

                  $title = $row['title'];
                  $content = $row['content'];
                  $user = $row['posted_by'];
                   $subject = $row['subject'];
                  $date_posted = $row['date_posted'];
                }
              }
              ?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<?php 

include 'includes/head.php';
?>

<body >
 
  <?php include 'includes/user-header.php';?>
  <div class="container-fluid">
      <div class="row">
           <div class="col-md-8">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">LESSONS</div>
                <div class="panel-body">
                  <div class="page-header">
                    <h2>EDIT LESSON</h2>
                  </div>
                    <div class="profilePosts">
                    <form action="edit_lesson.php" role="form" name="form1" method="POST">
                        <div class="form-group">
                        <strong>LESSON TITLE:</strong><br />
                          <input name="title" class="form-control" type="text" value="<?php echo $title;?>" required>
                           <input name="id" class="form-control" type="hidden" value="<?php echo $les_id;?>">
                           <input name="subject" class="form-control" type="hidden" value="<?php echo $subject;?>">
                          <br />
                        </div>
                          <div class="form-group">
                        <strong>LESSON CONTENT:</strong><br />
                          <textarea name="content" id="content" class="form-control" type="text" rows="15" cols="150" required><?php echo $content;?></textarea>
                  
                        <input type="submit" name="btnedit" class="btn btn-default" value="SAVE"> <input type="hidden" name="lesson_id"  value="">
                        </div>
                          <script>CKEDITOR.replace( 'content' );</script>
                      </form>

                 </div>

                </div>
              </div>
          </div>

          <div class="col-md-4">
                <h2>Comments</h2>
              <hr />
              <?php
                     $comments = $conn->query("SELECT * FROM comments WHERE lesson_id='$les_id' ");
                        if($comments->num_rows == 0){
                            echo "<tr>
                              <td colspan='6'>No Comment Posted</td>
                            </tr>";
                        }else{
                        while($row = $comments->fetch_assoc()){
                          $comment_id = $row['id'];
                          $comment = $row['comment'];
                          $posted = $row['posted_by'];
                          $posted_id = $row['posted_id'];
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
                            }//end of switch
                           
                          echo "
                          <div class='comment'>
                          <div class='thumbnail'>
                            <div class='caption'>
                              <h4>$posted <br/> <small>$count $suffix ago</small></h4>
                              <p>$comment</p>
                                  <div class='page-header'>
                                    <h3>Replies</h3>
                                  </div>
                               <p> $reply_content</p>
                              <iframe src='reply_frame.php?id=$comment_id' style='height:auto;width:100%;min-height:10px;border:none;' scrolling='auto'></iframe>        
                              <form action='post_reply.php' method='post'>
                              <input type='hidden' name='reply_to' value='$posted_id'/>
                              <input type='hidden' name='lesson_id' value='$les_id'/>
                              <input type='hidden' name='comment_id' value='$comment_id'/>
                              <input type='hidden' name='reply_by' value='$id'/>
                              <textarea  name='reply_content' class='form-control'/></textarea>
                              <p><input type='submit'name='reply' value='Reply'/></p>
                              </form>
                            </div>
                            
                          </div>
                         
                        </div>

                            ";
                           
                            }//end of while
                      }   
               ?>
          </div>
         
      </div>
  </div>

 
    <!-- Include all compiled plugins (below), or include individual files as needed -->

<?php include 'includes/footer.php';?>
 
</body>
</html>
