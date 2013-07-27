<?
session_start();
include("includes/session.php");
if ($row_user['type']=='admin')
{
	if(isset($_POST['submit']))
		{
		if($_FILES['picture']['name']=="")
			{
				$hasil= $_POST['picture_old'];
				
				if($_FILES['picture_detail']['name']=="")
				{
					$hasil2= $_POST['picture_detail_old'];
				}
			}
			else
			{
				$get_extention=explode('.',$_FILES['picture']['name']);
				$jml=count($get_extention);
				$nama_file_new=$_GET['id'].'.'.$get_extention[$jml-1];
				$tujuan='images/gallery/'.$nama_file_new;
				if(move_uploaded_file($_FILES["picture"]["tmp_name"],$tujuan))
				{
					$hasil=$nama_file_new;
					$get_extention2=explode('.',$_FILES["picture_detail"]["name"]);
					$jml2=count($get_extention2);
					$nama_file_new2=$_GET['id'].'.'.$get_extention2[$jml2-1];
					$tujuan2='images/gallery/detail/'.$nama_file_new2;
					if(move_uploaded_file($_FILES["picture_detail"]["tmp_name"],$tujuan2))
					{
						$hasil2=$nama_file_new2;
					}
					else
					{
						$hasil2=$_POST['picture_detail_old'];
					}
				}
				else
				{
					$hasil=$_POST['picture_old'];
				}
			}
			$update=mysql_query("update gallery set picture='".$hasil."',picture_detail='".$hasil2."' where gallery_id='".$_GET['id']."'");
			if($update==true)
			{
				$msg='success';
			}
			else
			{
				$msg='fail';
			}
		}
$gallery=mysql_query("select * from gallery where gallery_id='".$_GET['id']."'");
$row_gallery=mysql_fetch_array($gallery);
?>
<html>
<head>
<?
include("includes/head2.php");
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Update Gallery Success!");
<?}
else if($msg=='fail'){?>
	alert("Update Gallery Failed!");
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
	<h3>Update Gallery</h3><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table border="0" background="images/bg_noise.png" width="90%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
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
			<td>
			<input type="hidden" name="picture_old"/>
			</td>
			<td rowspan="3" valign="top">
			<a class="fancyimage" href="images/gallery/detail/<? echo $row_gallery['picture_detail'];?>"><img class="image_table" src="images/gallery/<? echo $row_gallery['picture'];?>" width="150" height="150" border="1"></a>
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
			<td>
			<input type="hidden" name="picture_detail_old"/>
			</td>
		</tr>
		<tr>
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