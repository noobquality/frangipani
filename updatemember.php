<?
session_start();
include("includes/session.php");
if ($row_user['type']=='admin')
{
	if(isset($_POST['submit']))
		{
			$update=mysql_query("update user set username='".$_POST['username']."',status='".$_POST['status']."',email='".$_POST['email']."',phone='".$_POST['phone']."',company='".$_POST['company']."',address='".$_POST['address']."' where username='".$_GET['username']."'");
			if($update==true)
			{
				$msg='success';
			}
			else
			{
				$msg='fail';
			}
		}
$usr=mysql_query("select * from user where username='".$_GET['username']."'");
$row_usr=mysql_fetch_array($usr);
?>
<html>
<head>
<?
include("includes/head2.php");
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Update Member Success!");
<?}
else if($msg=='fail'){?>
	alert("Update Member Failed!");
<?}?>
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
            <li><a href="member.php">Member</a></li>
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
	<h3>Update Member</h3><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="60%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
		<tr>
			<td><h6>Username</h6></td>
			<td><h6>:</h6></td>
			<td><input type="text" name="username" class="member_input2" value="<? echo $row_usr['username'];?>"/></td>
		</tr>
		<tr>
			<td><h6>Status</h6></td>
			<td><h6>:</h6></td>
			<td><select name="status" class="merah2">
			<?if($row_usr['status']!=''){
				if($row_usr['status']=='active'){?>
					<option value="<? echo $row_usr['status'];?>" selected="selected">Active</option>
					<option value="nonactive">Nonactive</option>
				<?}else{?>
					<option value="active">Active</option>
					<option value="<? echo $row_usr['status'];?>"selected="selected">Nonactive</option>
				<?}
				}
				else{?>
				<option value="active">Active</option>
				<option value="nonactive">Nonactive</option>
				<?}?>
			</select>
			</td>
		</tr>
		<tr>
			<td><h6>Email</h6></td>
			<td><h6>:</h6></td>
			<td><input type="text" name="email" class="member_input2" value="<? echo $row_usr['email'];?>"/></td>
		</tr>
		<tr>
			<td><h6>Phone</h6></td>
			<td><h6>:</h6></td>
			<td><input type="text" name="phone" class="member_input2" value="<? echo $row_usr['phone'];?>"/></td>
		</tr>
		<tr>
			<td><h6>Company</h6></td>
			<td><h6>:</h6></td>
			<td><input type="text" name="company" class="member_input2" value="<? echo $row_usr['company'];?>"/></td>
		</tr>
		<tr>
			<td><h6>Address</h6></td>
			<td><h6>:</h6></td>
			<td><input type="text" name="address" class="member_input2" value="<? echo $row_usr['address'];?>"/></td>
		</tr>
		<tr>
        <td colspan="3" align="center">
        <input class="button kursor" type="submit" name="submit" value="update"/>
        &nbsp;&nbsp;&nbsp;
        <input class="button kursor" type="reset" name="reset" value="reset"/>
        </td>
		</tr>
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