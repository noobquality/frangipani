<?
include("includes/db.php");
$cekUser=mysql_query("select * from user where username='".$_POST['username']."' and password='".base64_encode($_POST['password'])."'");
if(mysql_num_rows($cekUser)==1)
	{
		$rowCekUser=mysql_fetch_array($cekUser);
		if($rowCekUser['status']!='nonactive')
		{
			$_SESSION['fangipani']=$_POST['username'];
			header("location:index.php");
		}
		else
		{
			$msg='User Expired';
			header('location:login.php?err='.$msg);
		}
	}
	else
	{
			$msg='Login error Incorrect username/password entered, Please try again';
			header('location:login.php?err='.$msg);
	}
?>