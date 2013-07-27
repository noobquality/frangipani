<?
session_start();
include("includes/session.php");
if ($row_user['type']=='admin')
{
	if(isset($_POST['submit']))
	{
	$gallery=mysql_query("select * from gallery order by gallery_id desc");
		if(mysql_num_rows($gallery)!=0)
		{
			$row_gallery=mysql_fetch_array($gallery);
			$get_id=explode('-',$row_gallery['gallery_id']);
			$urut_id=$get_id[1]+1;
			$id='G-'.$urut_id;
		}
		else
		{
			$id='G-10000001';
		}
	$get_extention=explode('.',$_FILES["picture"]["name"]);
	$jml=count($get_extention);
	$nama_file_new=$id.'.'.$get_extention[$jml-1];
	$tujuan='images/gallery/'.$nama_file_new;
	if(move_uploaded_file($_FILES["picture"]["tmp_name"],$tujuan))
		{
			$hasil=$nama_file_new;
			//////////////////////////////////////////////////////////////
			$get_extention2=explode('.',$_FILES["picture_detail"]["name"]);
			$jml2=count($get_extention2);
			$nama_file_new2=$id.'.'.$get_extention2[$jml2-1];
			$tujuan2='images/gallery/detail/'.$nama_file_new2;
			if(move_uploaded_file($_FILES["picture_detail"]["tmp_name"],$tujuan2))
			{
				$hasil2=$nama_file_new2;
			}
		}
		$insert=mysql_query("insert into gallery (gallery_id,picture,picture_detail)values('".$id."','".$hasil."','".$hasil2."')");
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
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Adding New Picture to Gallery Success!");
<?}
else if($msg=='fail'){?>
	alert("Adding New Picture to Gallery Failed!");
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
	<h3>Add Gallery</h3><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="80%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
        <tr>
			<td>
			<h6>Picture</h6>
			</td>
			<td>
			<h6>:</h6>
			</td>
			<td>
			<input type="file" name="picture" class="merah"/>
			</td>
		</tr>
		<tr>
			<td>
			<h6>Picture Detail</h6>
			</td>
			<td>
			<h6>:</h6>
			</td>
			<td>
			<input type="file" name="picture_detail" class="merah"/>
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