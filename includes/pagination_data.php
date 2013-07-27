<?php
include('config.php');
$per_page = 9;
if($_GET)
{
$page=$_GET['page'];
}

$start = ($page-1)*$per_page;
$sql = "select * from messages order by msg_id limit $start,$per_page";
$result = mysql_query($sql);
?>
<table width="800px">
<?php
while($row = mysql_fetch_array($result))
{
$msg_id=$row['msg_id'];
$message=$row['message'];
?>
<tr>
<td><?php echo $msg_id; ?></td>
<td><?php echo $message; ?></td>
</tr>
<?php
}
?>
</table>