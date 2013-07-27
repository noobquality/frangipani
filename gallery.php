<?
session_start();
include("includes/session.php");
if($_GET['do']=='delete')
{
	$hapus=mysql_query("delete from gallery where gallery_id='".$_GET['id']."'");
}
?>
<html>
<head>
<?
include("includes/head2.php");
?>
<script language="javascript">
function getDelete(id)
		{
			var hasil = window.confirm("are you sure to delete");
				if(hasil)
				{
					window.location="gallery.php?do=delete&id="+id;
				}
		}
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
            <li><a href="gallery.php" class="current">Gallery</a></li>
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
            <li><a href="gallery.php" class="current">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
	</div>
<?}?>
    <div id="container">
	<?
	include("includes/user.php");
	?>
      <div class="wrapper">
        <div class="border"></div>
		<? if($row_user['type']=='admin'){?>
		<article class="fullwidth gallery2">
		<div>
		<a href="addgallery.php"><input class="button kursor" type="button" value="Add Gallery" />
		</div>
		<br />
		<?}
		else{?>
		<article class="fullwidth gallery">
		<h6>* Click Picture to Enlarge!</h6>
		<?}
		if($row_user['type']=='admin'){
		$result=mysql_query("select * from gallery");
		}
		else{
		$result=mysql_query("select * from gallery");
		}
		while($row_gallery=mysql_fetch_array($result)){
		?>
		<? if($row_user['type']=='admin'){?>
        <a class="fancyimage" href="images/gallery/detail/<? echo $row_gallery['picture_detail'];?>"><img src="images/gallery/<? echo $row_gallery['picture'];?>" width="160" height="160" alt=""/></a>
		<a href="updategallery.php?id=<? echo $row_gallery['gallery_id'];?>"><img src="images/edit.png" height="20" class="kursor"/></a><img src="images/delete.png" height="20" class="kursor" onClick="getDelete('<? echo $row_gallery['gallery_id'];?>')"/>
		<?}
		else{?>
		<a class="fancyimage" href="images/gallery/detail/<? echo $row_gallery['picture_detail'];?>"><img src="images/gallery/<? echo $row_gallery['picture'];?>" width="200" height="200" alt=""/></a>
		<?}
		}?>
		</article>
		<div class="border2"></div>
        <br />
		<footer>
		<?
		include("includes/footer.php");
		?>
        </footer>
    </div>
</body>
</html>