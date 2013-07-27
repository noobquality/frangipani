<?
include("includes/db.php");
$user=mysql_query("select * from user where username='".$_SESSION['fangipani']."'");
$row_user=mysql_fetch_array($user);
?>