<?
include("includes/session.php");
if ($row_user['type']=='admin')
{
	if(isset($_POST['submit']))
		{
			//
			$category=mysql_query("select * from category order by category_id desc");
			if(mysql_num_rows($category)!=0)
			{
				$row_category=mysql_fetch_array($category);
				$get_id=explode('-',$row_category['category_id']);
				$urut_id=$get_id[1]+1;
				$id='C-'.$urut_id;
			}
			else
			{
				$id='C-10000001';
			}
			$insert=mysql_query("insert into category (category_id,category_name) values('".$id."','".$_POST['category_name']."')");
			if($insert==true)
			{
				$msg="success";
			}
			else
			{
				$msg="fail";
			}
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
	alert("Adding Category Success!");
<?}
else if($msg=='fail'){
?>
	alert("Adding Category Failed!");
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
	<div style="margin:0px auto; width:960px;" align="center">
	<h3 align="center">Add Category</h3><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="100%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
        <tr>
            <td>
            	<h6>Category Name</h6>
            </td>
            <td>
            	<h6>:</h6>
            </td>
            <td>
            	<input type="text" name="category_name" size="45" class="order_input"/>
            </td>
            </tr>
			<tr><td></td></tr>
            <tr>
            <td colspan="3" align="center">
            	<input type="submit" name="submit" value="submit"class="button kursor"/>
                &nbsp;&nbsp;&nbsp;
                <input type="reset" name="reset" value="reset"class="button kursor"/>
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