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
          <h1>Science</h1>
      </div>
  </div>
  <div class="row">

                  <?php 
                  // First query is just to get the total count of rows
                  $sql = "SELECT COUNT(id) FROM tbl_lessons WHERE posted_by='$id' AND subject='science'"; 
                  $query = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_row($query);
                  //total row count
                  $rows = $row[0];
                  //Number of results we want displayed per page
                  $page_rows=6;
                  //page number of our last page
                  $last = ceil($rows/$page_rows); 
                  //this makes sure $last cannot be less than 1
                  if($last<1){
                      $last =1;
                  }
                  //Establish the $pagenum variable
                  $pagenum = 1;
                  //Get pagenum from URL vars if it is present, else it is equal to 1
                  if(isset($_GET['pn'])){
                      $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                  }
                  //this makes sute the page number isn't below 1, or more than our $last page
                  if($pagenum<1){
                    $pagenum =1;
                  }else if($pagenum>$last){
                    $pagenum = $last;
                  }
                  //This sets the range of rows to query for the chosen $pagenum
                  $limit = 'LIMIT '.($pagenum - 1) * $page_rows.','.$page_rows;
                  $textline1 = "Lessons (<b>$rows</b>)";
                   $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
                  //Establish the $paginationCtrls variable
                   $paginationCtrls ='';
                   //if there is more than 1 worth of results
                   if($last !=1)
                    /*First we check if we are on page one. If we are then we don't need a link to the previous page 
                      or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page*/
                   {
                      if($pagenum>1){
                        $previous = $pagenum -1;
                        $paginationCtrls .='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" aria-label="Previous">Previous</a> ';
                        //Render clickable number links that should appear on the left of the target page number
                        for($i=$pagenum -4;$i<$pagenum;$i++){
                          if($i>0){
                            $paginationCtrls .='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> ';
                          }
                        }
                      }
                      //Render the target page number, but without it being a link
                      $paginationCtrls .=''.$pagenum.'&nbsp;';
                      for($i=$pagenum + 1;$i <= $last;$i++){
                          $paginationCtrls .='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>';
                        if($i>=$pagenum + 4){
                          break;
                        }
                      }
                   //This does the same as above, only checking if we are on the last page, and then generating the "NEXT"   
                      if($pagenum !=$last){
                        $next=$pagenum + 1;
                        $paginationCtrls .=' <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" aria-label="Next">Next</a> ';
                      }
             }
             $list = '';

                $result = $conn->query("SELECT * FROM tbl_lessons WHERE subject='science' ORDER BY date_posted DESC $limit");
                if($result->num_rows == 0){
                    echo "<div class='well'>
                      <h3>No Lesson Posted</h3>
                    </div>";
                }else{
                while($row = $result->fetch_assoc()){
                        $id=$row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $posted = $row['posted_by'];
                         $subject = $row['subject'];
                        $date_posted = $row['date_posted'];
                   if (strlen($content) > 100) {
                     $content = substr($content, 0, 100)." ...";
                    }
                    else{
                    $content = $content;
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
                  echo "
                   <div class='col-sm-6'>
                      <div class='lessons'>
                        <div class='thumbnail'>
                        <img src='lesson_header/sci.jpg' width='500' height='500' class='img img-thumbnail'>
                          <div class='caption'>
                            <h3>$title<br /> <small>$count $suffix ago</small></h3>
                            <p>$content</p>
                            <p><a href='view_lesson.php?id=$id' class='btn btn-primary' role='button'>Read more</a></p>
                          </div>
                        </div>
                    </div>
                  </div>
                    ";
                }
              }
              ?>
              
              
              <p><?php echo $textline2;?> Paged</p>
              
              <nav ><ul class="pagination pagination-lg"><?php echo $paginationCtrls; ?></ul></nav>
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
