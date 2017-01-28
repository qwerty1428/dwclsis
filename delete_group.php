<?php 
include "core/init.php";

$deletelesson = mysql_query("DELETE FROM tbl_group WHERE gid = ".$_GET['id']."");
header("location:group_index.php");

?>