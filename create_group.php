<?php 
include 'core/init.php';

?>
<div class="col-md-12">
<div class="page-header">
	
	<h3>Create Group</h3>
</div>
	<form class="form-horizontal" action="create_group_parse.php" method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-5 control-label">Group Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="group_name" placeholder="Group Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Password</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="password" id="inputPassword3" placeholder="Password">
      <button class="btn btn-default" type="button" onclick="makeid()">Generate</button>
    </div>

  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="save" class="btn btn-default" value="Save" />
    </div>
  </div>
</form>
</div>
<script type="text/javascript">
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    
    document.getElementById("inputPassword3").value =text;
}
function myFunction() {
    document.getElementById("inputPassword3").value = Math.random();
}

</script>