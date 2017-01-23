<?php 
include "core/init.php";
include "includes/overall_header.php";
if(logged_in()== true){
  include "includes/menu_header.php";
$selectGroup= mysql_query("SELECT * FROM tbl_group  ");
?>
<div class="col-xs-6 col-md-4"  >
    <?php include "includes/side-menu.php";
    
    
    ?>

</div>
<div class="col-xs-12 col-sm-6 col-md-8 content"  >
<div class='page-header'>
      <h4>Create Question</h4>
   </div>
<!--  <div class="content" id="tf" style='display:none;'>
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
-->


 <div class="content" id="mc" style='display:hidden;'>
  	<h3>Multiple Choice</h3>
    <form action="addQuestion_parse.php" name="addMcQuestion" method="post" class="form-horizontal">
     

       <?php 
       if(isset($_GET['id'])){
       $question= mysql_query("SELECT * FROM quiz_questions WHERE id = ".$_GET['id']."");
       while($row=mysql_fetch_assoc($question)){
         
         $quiz_question = $row['question'];

        echo "<div class='form-group'>
    <div class='col-sm-10'>
    <strong>Please type your new question here</strong>
        
       
        <textarea id='mcdesc' name='desc' class='form-control' style='width:400px;height:95px;' required>$quiz_question </textarea>
       
       </div>
       </div>";

        $quiz_answers = mysql_query("SELECT * FROM answers_questions WHERE question_id = ".$row['id']." ");
        while($row1 = mysql_fetch_assoc($quiz_answers)){
         $answers = $row1['answer'];
         $correct_ans = $row1['correct'];
         if($correct_ans==1){
          $checked='checked';
         }
        echo "


        <div class='form-group'>
          <div class='col-sm-10'>
        <strong>Please create the first answer for the question</strong>
          <br />
            <input type='text' id='mcanswer1'  name='answer[]' required value='$answers'>&nbsp;
              <label style='cursor:pointer; color:#06F;'>
              <input type='radio' name='iscorrect[]'  value='answer1' $checked>Correct Answer?
            </label>
       
        </div>
    </div>
   
    ";

       }


       }

        echo "<input type='text'  name='id'  value='".$_GET['id']."' />";
    }else{
      echo "<div class='content' id='mc'>

   
    <strong>Please type your new question here</strong>
        <br />
        <textarea id='mcdesc' name='desc' style='width:400px;height:95px;'></textarea>
        <br />
      <br />
    <strong>Please create the first answer for the question</strong>
      <br />
        <input type='text' id='mcanswer1' name='answer1'>&nbsp;
          <label style='cursor:pointer; color:#06F;'>
          <input type='radio' name='iscorrect' value='answer1'>Correct Answer?
        </label>
      <br />
    <br />
    <strong>Please create the second answer for the question</strong>
    <br />
        <input type='text' id='mcanswer2' name='answer2'>&nbsp;
          <label style='cursor:pointer; color:#06F;'>
          <input type='radio' name='iscorrect' value='answer2'>Correct Answer?
        </label>
      <br />
    <br />
    <strong>Please create the third answer for the question</strong>
    <br />
        <input type='text' id='mcanswer3' name='answer3'>&nbsp;
          <label style='cursor:pointer; color:#06F;'>
          <input type='radio' name='iscorrect' value='answer3'>Correct Answer?
        </label>
      <br />
    <br />
    <strong>Please create the fourth answer for the question</strong>
    <br />
        <input type='text' id='mcanswer4' name='answer4'>&nbsp;
          <label style='cursor:pointer; color:#06F;'>
          <input type='radio' name='iscorrect' value='answer4'>Correct Answer?
        </label>
      <br />
    <br />

 </div>";
    }
 

       ?>
      
     
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

 <?php 
//footer
include "includes/overall_footer.php";
?>