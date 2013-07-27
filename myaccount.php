<?
session_start();
include("includes/session.php");
$pass=base64_decode($row_user['password']);
$newpass=mysql_real_escape_string($_POST['password']);
$new=base64_encode($newpass);
if(isset($_POST['submit']))
{
	$update=mysql_query("update user set 
	username='".$_POST['username']."',
	password='".$new."',
	email='".$_POST['email']."',
	phone='".$_POST['phone']."',
	company='".$_POST['company']."',
	address='".$_POST['address']."' where username='".$_GET['username']."'");
	if($update==true)
	{
		$msg='success';
	}
	else
	{
		$msg='fail';
	}
	header('location:myaccount.php?username=ananta');
}
?>
<html>
<head>
<?
include("includes/head.php");
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Update Information Success! Please Refress your Browser");
<?}
else if($msg=='fail'){?>
	alert("Update Information Failed!");
<?}?>
</script>
</head>
<body>
<? if($row_user['type']=='admin'){?>
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
<?}
else{?>
<div id="header">
	<nav>
	  <ul id="nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="menu.php">Menu</a></li>
		<li><a href="gallery.php">Gallery</a></li>
		<li><a href="contact.php">Contact</a></li>
	  </ul>
	</nav>
</div>
<?}?>
<div id="container">
<?
	include("includes/user.php");
?>
	<div class="wrapper" style="font-color:#9c5959">
    <div class="border"></div>
    <article>
	<h3>Your Information!</h3>
	<br />
	<form action="#" method="post" enctype="multipart/form-data">
		<table border="0" background="images/bg_noise.png" width="40%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
		<tr>
		<td><h6>Username</h6></td><td><h6>:</h6></td>
		<td>
		<input type="text" name="username" class="order_input" value="<? echo $row_user["username"];?>"/></input>
		</td>
		</tr>
		<tr>
		<td><h6>Password</h6></td><td><h6>:</h6></td>
		<td>
		<input type="password" name="password" class="order_input" value="<? echo $pass?>"/></input>
		</td>
		</tr>
		<tr>
		<td><h6>Email</h6></td>
		<td><h6>:</h6></td>
		<td>
		<input type="text" name="email" class="order_input" value="<? echo $row_user["email"];?>"/></input>
		</td>
		</tr>
		<tr>
		<td><h6>Phone</h6></td><td><h6>:</h6></td>
		<td>
		<input type="text" name="phone" class="order_input" value="<? echo $row_user["phone"];?>"/></input>
		</td>
		</tr>
		<tr>
		<td><h6>Company</h6></td><td><h6>:</h6></td>
		<td>
		<input type="text" name="company" class="order_input" value="<? echo $row_user["company"];?>"/></input>
		</td>
		</tr>
		<tr>
		<td><h6>address</h6></td><td><h6>:</h6></td>
		<td>
		<textarea cols="40" rows="8" name="address" class="contact_textarea3"><? echo $row_user["address"];?></textarea>
		</td>
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
		<blockquote><strong>If You Want to Update Your Information, just Rewrite form with your New Information and then Click Update!</strong>
		<br /><br /><strong>If nothing changed after you press submit, please be patience, and write again, press submit again, it's screw, but we still work for it!</strong></blockquote>
	</article>
	<aside class="sidebar">
    <h3>We Are Social</h3>
	<?
	include("includes/social.php");
	?>
	</aside>
	<div class="border2"></div>
	<br>
	</div>
<footer>
<?
include("includes/footer.php");
?>
</footer>
</div>
</body>
</html>