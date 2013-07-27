<?
include("includes/session.php");
if($_GET['username']!='')
{
	$data=mysql_query("select * from user where username='".$_GET['username']."'");
	if (mysql_num_rows($data)==1)
	{
		?>
		* Username Not Available
		<?
		}
		else
		{
		?>
		* Username Available
		<?
		}
	}
?>