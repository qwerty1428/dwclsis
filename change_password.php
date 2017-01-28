<form action="changepassword.php" class="form-inline" method="POST">
<h3 class="page-header">
	Enter Group Password
</h3>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">New Password</label>
    <input type="password" class="form-control" name="pwd" required onchange="form.pwd2.pattern = this.value;" required placeholder="New Password">
  </div>
  <br />
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Confirm Password</label>
    <input type="password" class="form-control" name="pwd2"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Confirm Password">
  </div>
  <button type="submit" name="submit" class="btn btn-default">Enter</button>
</form>

