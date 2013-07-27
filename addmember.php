<?
session_start();
include("includes/session.php");
if ($row_user['type']=='admin')
{
	if(isset($_POST['submit']))
		{
			$cekUser=mysql_query("select * from user where username='".$_POST['username']."' and password='".base64_encode($_POST['password'])."'");
			if(mysql_num_rows($cekUser)==1)
			{
				$msg='duplicate';
			}
			else
			{
			$frdate=explode("/",$_POST['frdate']);
			$tgl=$frdate[2].'-'.$frdate[1].'-'.$frdate[0];
			}
			$insert=mysql_query("insert into user(username,password,birthday,type,status,email,phone,company,address) values('".$_POST['username']."','".base64_encode($_POST['password'])."','".$tgl."','".$_POST['type']."','".$_POST['status']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['company']."','".$_POST['address']."')");
			if($insert==true)
		{
			$msg='success';
		}
		else
		{
			$msg='fail';
		}
	}
?>
<html>
<head>
<?
include("includes/head.php");
include"widgets/calendar/calc.php";
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Adding New Member Success!");
<?}
else if($msg=='fail'){?>
	alert("Adding Member Failed!");
<?}
else if($msg=='duplicate'){?>
	alert("Member Already Create!");
<?}?>
</script>
<script type="text/javascript" src="scripts/java.js"></script>
</head>
<body onload="createrequest()">
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
	<h3>Add Member</h3><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="80%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
        <tr>
		<td><h6>Username</h6></td><td><h6>:</h6></td>
		<td>
		<input class="order_input" type="text" name="username"/>
		</td>
		</tr>
		<tr>
		<td><h6>Password</h6></td><td><h6>:</h6></td>
		<td>
		<input class="order_input" type="password" name="password"/>
		</td>
		</tr>
		<tr>
		<td><h6>Birthday</h6></td><td><h6>:</h6></td>
		<td>
		<input type="text" class="order_input" name="frdate" id="frdate" readonly="readonly"/>
		<img src="widgets/calendar/img.gif" class="kursor" width="25" height="15" id="img_frdate" />
		<script type="text/javascript">
		Calendar.setup
		({
			inputField 	: 	"frdate",
			ifFormat 	:	"%d/%m/%Y",
			button		:	"img_frdate",
			align		:	"B1",
			singleClick	:	true
		});
		</script>
		</td>
		</tr>
		<tr>
		<td><h6>Type</h6></td><td><h6>:</h6></td>
		<td>
		<select name="type" class="merah2">
		<option value="admin">Admin</option>
		<option value="member">Member</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><h6>Status</h6></td><td><h6>:</h6></td>
		<td>
		<select name="status" class="merah2">
		<option value="active">Active</option>
		<option value="nonactive">Nonactive</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><h6>Email</h6></td><td><h6>:</h6></td>
		<td>
		<input class="order_input" type="text" name="email"/>
		</td>
		</tr>
		<tr>
		<td><h6>Phone</h6></td><td><h6>:</h6></td>
		<td>
		<input class="order_input" type="text" name="phone"/>
		</td>
		</tr>
		<tr>
		<td><h6>Company</h6></td><td><h6>:</h6></td>
		<td>
		<input class="order_input" type="text" name="company"/>
		</td>
		</tr>
		<tr>
		<td><h6>Address</h6></td><td><h6>:</h6></td>
		<td>
		<textarea name="address" cols="40" rows="5" class="contact_textarea"></textarea>
		</td>
		</tr>
		<tr>
		<td colspan="3" align="center">
		<input class="button kursor" type="submit" name="submit" value="submit"/>
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