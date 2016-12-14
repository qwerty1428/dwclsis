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
                   $result = $conn->query("SELECT * FROM tbl_lessons WHERE subject='science'");
                if($result->num_rows == 0){
                    echo "<tr>
                      <td colspan='6'>No Lesson Posted</td>
                    </tr>";
                }else{
                while($row = $result->fetch_assoc()){
                  $id = $row['id'];
                  $title = $row['title'];
                  $content = $row['content'];
                  $posted = $row['posted_by'];
                   $subject = $row['subject'];
                  $date_posted = $row['date_posted'];
               if (strlen($content) > 250) {
                     $content = substr($content, 0, 250)." ...";
                    }
                    else{
                    $content = $content;
                    }
                    
                  echo "
             
                  <div class='lessons'>
                  <div class='thumbnail'>
                    <div class='caption'>
                      <h3>$title</h3>
                      <p>$content</p>
                      <p><a href='science_view_lesson.php?id=$id' class='btn btn-primary btn-lg btn-block' role='button'>Read more</a></p>
                    </div>
                  </div>
                </div>
                  


                    ";
                }
              }
           


              ?>
         
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
<script src="js/jquery-1.11.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
