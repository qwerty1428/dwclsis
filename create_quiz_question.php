<?php 
include "core/init.php";
include "includes/overall_header.php";
if(logged_in()== true){
  include "includes/menu_header.php";
$selectGroup= mysql_query("SELECT * FROM tbl_group  ");
?>
<div class="col-xs-6 col-md-4"  >
    <?php include "includes/side-menu.php";?>

</div>
<div class="col-xs-12 col-sm-6 col-md-8 content"  >
<div class='page-header'>
      <h4>Create Question</h4>
   </div>
  <div class="content" id="tf" style='display:none;'>
  	<h3>True or false</h3>
    	<form action="addQuestion_parse.php" name="addQuestion" method="post">
    <strong>Please type your new question here</strong>
    	<br />
    		<textarea id="tfDesc" name="desc" class="form-control" style="width:400px;height:95px;"></textarea>
    	  <br />
    	<br />
    	<strong>Please select whether true or false is the correct answer</strong>
    	<br />
            <input type="text" id="answer1" name="answer1" value="true" readonly>&nbsp;
              <label style="cursor:pointer; color:#06F;">
            <input type="radio" name="iscorrect" value="answer1">Correct Answer?</label>
    	  <br />
   		<br />
            <input type="text" id="answer2" name="answer2" value="false" readonly>&nbsp;
              <label style="cursor:pointer; color:#06F;">
              <input type="radio" name="iscorrect" value="answer2">Correct Answer?
            </label>
    	  <br />
    	<br />
    	<input type="hidden" value="tf" name="type">
    	<input type="submit" value="Add To Quiz">
    </form>
 </div>
 <div class="content" id="mc" style='display:hidden;'>
  	<h3>Multiple Choice</h3>
    <form action="addQuestion_parse.php" name="addMcQuestion" method="post" class="form-horizontal">
     <div class="form-group">
    <div class="col-sm-10">
    <strong>Please type your new question here</strong>
        
       
        <textarea id="mcdesc" name="desc" class="form-control" style="width:400px;height:95px;" required></textarea>
       
     	 </div>
     	 </div>
      <div class="form-group">
		      <div class="col-sm-10">
		    <strong>Please create the first answer for the question</strong>
		    	<br />
		        <input type="text" id="mcanswer1"  name="answer1" required>&nbsp;
		          <label style="cursor:pointer; color:#06F;">
		          <input type="radio" name="iscorrect"  value="answer1" >Correct Answer?
		        </label>
		   
		    </div>
    </div>
    <div class="form-group">
	    <div class="col-sm-10">
	    <strong>Please create the second answer for the question</strong>
	    <br />
	        <input type="text" id="mcanswer2"  name="answer2" required>&nbsp;
	          <label style="cursor:pointer; color:#06F;">
	          <input type="radio" name="iscorrect"  value="answer2" >Correct Answer?
	        </label>
	      
	    </div>
    </div>
    <div class="form-group">
		    <div class="col-sm-10">
		    <strong>Please create the third answer for the question</strong>
		    <br />
		        <input type="text" id="mcanswer3"  name="answer3" required>&nbsp;
		          <label style="cursor:pointer; color:#06F;">
		          <input type="radio" name="iscorrect"  value="answer3" >Correct Answer?
		        </label>
		    
		    </div>
    </div>
    <div class="form-group">
    <div class="col-sm-10">
    <strong>Please create the fourth answer for the question</strong>
    <br />
        <input type="text" id="mcanswer4"  name="answer4" required>&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect"  value="answer4" >Correct Answer?
        </label>
        </div>
     </div>
     <div class="form-group">
    <div class="col-sm-2">
                  <strong>Group</strong><br />
      <select name="group" required class="form-control">
           <option value=""><?php echo $g; ?></option>
             <?php            
             while ($row1 = mysql_fetch_assoc($selectGroup)) {
                                
               echo "
             <option value=".$row1['gid'].">".$row1['gname']."</option>";
             }

              ?> 
          </select>

             </div>
     </div>
      <div class="form-group">
                        <div class="col-sm-2">
                        <strong>Quarter</strong><br />
                           <select name="qtr" required class="form-control">
                              
                    
                              
                              <option value="" ><?php echo $qtr; ?></option>
                              <option value="1st">1st</option>
                              <option value="2nd">2nd</option>
                              <option value="3rd">3rd</option>
                              <option value="4th">4th</option>
                           </select>

                        </div>
                        </div>
      <div class="form-group">
      		

    <div class="col-sm-2">
    <label for="inputPassword3" class="2 control-label">Password</label>
      <input type="text" class="form-control" name="password" id="inputPassword3" placeholder="Password"><br />
      			

      		</div>

      </div>
       <button class="btn btn-default " type="button" onclick="makeid()">Generate</button>

       
    <input type="hidden" value="mc" name="type">
    <input type="submit" class="btn btn-default" value="Add To Quiz">
    </form>
 </div>
</div>
     <?php
  
}else{
  header("location:login-form.php");
}


?>
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
 <?php 
//footer
include "includes/overall_footer.php";
?>