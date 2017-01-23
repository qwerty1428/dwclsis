<?php 
include 'core/init.php';
?>
<form action="create_quiz_parse.php" class="form-horizontal" method="POST">
<h3 class="page-header">Create Quiz
</h3>
  <div class="form-group">
    <label class="sr-only col-sm-2" for="exampleInputPassword3">Quiz Name</label>
     <div class="col-sm-10">
    	<input type="text" class="form-control" name="quiz_name" required placeholder="Quiz Name">
  	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
                  <strong>Group</strong><br />
      <select name="group" required class="form-control">
            <option value="" >Please Select</option>
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
                        <div class="col-sm-10">
                        <strong>Quarter</strong><br />
                           <select name="qtr" required class="form-control">
                              
                    
                              
                              <option value="" >Please Select</option>
                              <option value="1st">1st</option>
                              <option value="2nd">2nd</option>
                              <option value="3rd">3rd</option>
                              <option value="4th">4th</option>
                           </select>

                        </div>
                        </div>

      <div class="form-group">
      		

    <div class="col-sm-10">
    <label for="inputPassword3" class="2 control-label">Password</label>
      <input type="text" class="form-control" name="password" id="inputPassword3" placeholder="Password"><br />
	</div>
	  <div class="form-group">
	  	<div class="col-sm-offset-2 col-sm-10">
	  	 <button class="btn btn-default " type="button" onclick="makeid()">Generate</button>
 		 <button type="submit" name="create" class="btn btn-default">Create</button>
 		 </div>
 	</div>
</form>

<script type="text/javascript">
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    
    document.getElementById("inputPassword3").value =text;
}

</script> 
