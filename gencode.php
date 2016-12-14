<?php
include "core/init.php";
if(isset($_GET['id'])){
$chars='012345678910ABCDEFGHIJKLMNOPQRSTUVXYZabcdefghijklmnopqrstuvxyz';
$code=substr(str_shuffle($chars), 0, 5);

$update = mysql_query("UPDATE tbl_lessons SET code = '$code' WHERE id ='".$_GET['id']."'");
?>

<div class="alert alert-success" role="alert">
  <h3>Group Code: <?php echo $code;?></h3>
  
</div>


<?php
}else{
?>

<h3>Failed to generate Code</h3>
<?php
}
?>

