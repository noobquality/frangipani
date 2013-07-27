<?
session_start();
include("includes/session.php");
if($_GET['do']=='delete')
{
	$hapus=mysql_query("delete from user where username='".$_GET['username']."'");
}
if ($row_user['type']=='admin')
{
?>
<html>
<head>
<?
include("includes/head.php");
?>
<script language="javascript">
function getDelete(username)
		{
			var hasil = window.confirm("are you sure to delete");
				if(hasil)
				{
					window.location="member.php?do=delete&username="+username;
				}
		}
</script>
</head>
<body>
	<div id="header">
        <nav>
          <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Chart</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="member.php" class="current">Member</a></li>
          </ul>
        </nav>
	</div>
	<div id="container">
	<header>
	<?
	include("includes/user.php");
	?>
	</header>
	<footer>
    <div class="border"></div>
    <div class="footer-widget">
	<div style="width:960px;" align="center">
		<h3>Member List</h3><br>
	</div>
    <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="50%" cellspacing="10px" cellpadding="10px" style="font-size:12px font-family='Lobster13Regular';">
		<tr><td colspan="7" align="right"><a href="addmember.php"><input class="button kursor" type="button" value="Add Member" /></td></tr>
		<tr>
		<td><h6><strong>Username</strong></h6></td>
		<td><h6><strong>Status</strong></h6></td>
		<td><h6><strong>Type</strong></h6></td>
		<td><h6><strong>Phone</strong></h6></td>
		<td><h6><strong>Birthday</strong></h6></td>
		<td><h6><strong>Address</strong></h6></td>
		<td colspan="2"><h6><strong>Action</strong></h6></td>
		</tr>
		<? 
		$usr=mysql_query("select * from user");
		while ($row_usr=mysql_fetch_array($usr)){
		?>
		<tr>
		<td><input type="text"class="member_input" value="<? echo $row_usr["username"];?>"/></input></td>
		<td><input type="text"class="member_input" value="<? echo $row_usr["status"];?>"/></input></td>
		<td><input type="text"class="member_input" value="<? echo $row_usr["type"];?>"/></input></td>
		<td><input type="text"class="member_input" value="<? echo $row_usr["phone"];?>"/></input></td>
		<td><input type="text"class="member_input" value="<? if($row_usr['birthday']!='0000-00-00'){echo date("d-m-Y",strtotime($row_usr['birthday']));}?>"/></input></td>
		<td><input type="text"class="member_input" value="<? echo $row_usr["address"];?>"/></input></td>
		<td align="center"><a href="updatemember.php?username=<? echo $row_usr['username'];?>"><img src="images/edit.png" height="20" /></a>&nbsp;&nbsp;&nbsp;<img src="images/delete.png" height="20" class="kursor" onClick="getDelete('<? echo $row_usr['username'];?>')"/></td>
		</tr>
		<?}?>
		</table>
       </form>
	   </div>
	</div>
    <div class="border2"></div>
    <br />
	<? include("includes/footer.php");?>
    </footer>
    </div>
</body>
</html>
<?}
else{
header("location:logout.php");
}
?>