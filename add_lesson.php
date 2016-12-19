<?php 
include 'core/init.php';
include "includes/overall_header.php";
if(logged_in()== true){
	include "includes/menu_header.php";

?>

<div class="col-xs-6 col-md-4"  >
	<?php include "includes/side-menu.php";?>

</div>
  <div class="col-xs-12 col-sm-6 col-md-8 content" >
      
                  <div class="page-header">
                    <h2>NEW LESSON</h2>
                    <h2 id="save"></h2>
                   <?php if(isset($_GET['id'])){
                    $lesson = mysql_query("SELECT * FROM tbl_lessons WHERE id = '".$_GET['id']."'");
                     $countlesson = mysql_num_rows($lesson);
                    while($row = mysql_fetch_assoc($lesson)){
                     $title = $row['title'];
                     $contentbox = $row['content'];
                     $postedby = $row['posted_by'];
                     $lessonid = $row['id'];
                     $qtr = $row['qtr'];
                      $group = $row['gid'];
                    $getGroup= mysql_query("SELECT * FROM tbl_group WHERE gid='$group'  ");
                    while ($row2 = mysql_fetch_assoc($getGroup)) {
                      $groupname = $row2['gname'];
                    }
                           
                    }
                     
                   
                      
                   }
                  if(isset($_GET['id']) ){
                     $qtr = "<option value=".$qtr." >".$qtr."</option>"; 
                     $g =  "<option value=".$groupname." >".$groupname."</option>";
                     } else{
                        $qtr = "<option value='' >Please Select</option>";
                    $g = "<option value='' >Please Select</option>";
                     }
                    

                     
                    ?>
                  </div>
                    <div class="profilePosts">
                    <form action="save_lesson.php" method="POST" >
                        <div class="form-group">
                        <div class="col-sm-8">
                        <strong>LESSON TITLE:</strong><br />
                          <input name="title" id="title"  required class="form-control" type="text"  value="<?php echo $title;?>" />
                           <input name="postedby" id="postedby" class="form-control" type="hidden"  
                           value="<?php echo $user_data['user_id'];?>"  /></div>
                        
                        </div>
                        <div class="form-group">
                        <div class="col-sm-2">
                        <strong>Quarter</strong><br />
                           <select name="qtr" required class="form-control">
                              
                    
                              
                            <?php echo $qtr; ?>
                              <option value="1st">1st</option>
                              <option value="2nd">2nd</option>
                              <option value="3rd">3rd</option>
                              <option value="4th">4th</option>
                           </select>

                        </div>
                        </div>
                       <div class="form-group">
                        <div class="col-sm-2">
                        <strong>Group</strong><br />
                       
                           <select name="group" required class="form-control">
                          <?php echo $g; ?>
                              <?php 
                               $selectGroup= mysql_query("SELECT * FROM tbl_group  ");
                              while ($row1 = mysql_fetch_assoc($selectGroup)) {
                                
                                echo "
                              <option value=".$row1['gid'].">".$row1['gname']."</option>";
                              }

                               ?>
                    
                              
                              
                           </select>

                        </div>
                        </div>
                          <div class="form-group">
                          <div class="col-sm-12">
                        <strong>LESSON CONTENT:</strong><br />
                          <textarea name="contentbox" id="contentbox" cols='150' rows='50' class="form-control" type="text" required ><?php echo $contentbox;?></textarea>
                        
                        <br />
                         <input name="lessonid" id="lessonid" class="form-control" type="hidden" value="<?php echo $lessonid;?>" />
                         </div>
                         </div>
                         <div class="form-group">
                             <div class="col-sm-10">
                            <input type="submit" name="btnedit" class="btn btn-default" value="SAVE"> 
                            <a href="lesson_index.php" class="btn btn-primary" >Back to List</a>
                           
                            </div>
                          </div>
                        
                          <script>CKEDITOR.replace( 'contentbox' );</script>
                      </form>

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

    
        

