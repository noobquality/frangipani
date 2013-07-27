<?
include("includes/session.php");
if($_GET['do']=='delete')
{
	$hapus=mysql_query("delete from products where product_id='".$_GET['id']."'");
}
?>
<html>
<head>
<?
include("includes/head2.php");
?>
<script type="text/javascript" src="scripts/java.js"></script>
<script language="javascript">
function getDelete(id)
		{
			var hasil = window.confirm("are you sure to delete");
				if(hasil)
				{
					window.location="menu.php?do=delete&id="+id;
				}
		}
</script>
</head>
<body onLoad="createrequest()">
<? if($row_user['type']=='admin'){?>
    <div id="header">
        <nav>
          <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Chart</a></li>
            <li><a href="menu.php" class="current">Menu</a></li>
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
        <li><a href="menu.php" class="current">Menu</a></li>
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
<div class="wrapper">
<div class="border"></div>
<article class="menu">
<? if($row_user['type']=='admin'){?>
<div align="left">
<a href="addmenu.php"><input class="button kursor" type="button" value="Add Menu" /></a></a>
&nbsp;&nbsp;
<a href="addcategory.php"><input class="button kursor" type="button" value="Add Category" /></a>
</div><?}
else{?><h6>* Click Picture to Enlarge!</h6><?}?>
<div class="merah2" align="right">
*Sort By Category :
	<select name="category" id="category" onChange="getData()">
	<option class="contact_input" value="">---------------------</option>
	<?
	$category=mysql_query("select * from category order by category_name");
	while($row_category=mysql_fetch_array($category))
	{?>
	<option class="contact_input" value="<? echo $row_category['category_id']?>"><? echo $row_category['category_name']?></option>
	<? }
	?>
	</select>
</div>
<form name="form1">
	<input type="hidden" name="product_id" />
	<input type="hidden" name="command" />
</form>
<div id="listData">
<table>
<?
if($_GET['page']!='')
{
	$hal=($_GET['page']-1)*3;
	}
	else
	{
		$_GET['page']=1;
		$hal='0';
		}
$result=mysql_query("select * from products limit $hal,3");
while($row=mysql_fetch_array($result)){
?>
<tr>
<td><a class="fancyimage" href="images/product/detail/<? echo $row['picture_detail']?>"><img src="images/product/<? echo $row['picture']?>" class="left clear item" width="150" height="150"></a></td>
<td><h6><? echo $row['product_name']?>  $<? echo $row['price']?></h6>
	<p><? echo $row['description']?></p>
	<!-------------------------------------------------------------------------------------------------------------->
	<? if($row_user['type']=='admin'){?>
	<a href="updatemenu.php?id=<? echo $row['product_id'];?>"><img src="images/edit.png" height="20" class="kursor"/></a>&nbsp;&nbsp;<img src="images/delete.png" height="20" class="kursor" onClick="getDelete('<? echo $row['product_id'];?>')"/>
	<?}
	else{?>
	<!-------------------------------------------------------------------------------------------------------------->
	<input class="button kursor" type="button" value="Add to Cart" onClick="addtocart(<? echo $row['product_id'];?>)" /></input>
	<?}?>
</td>
</tr>
<tr><td colspan="2"><hr class="border4" /></td></tr>
<? } ?>
</table>
<div class="PagesFlickr" align="right">
<div class="Paginator">
<?
$query_page=mysql_query("select * from products");
$jml=mysql_num_rows($query_page);
$jml_page=ceil($jml/3);
$mulai=1;
if(($_GET['page']!=1) && ($_GET['page']!='')){
?>
<a href="menu.php?page=<? echo $mulai;?>">
<?
echo'First';
?>
</a>
<?
}
echo '&nbsp;';
if(($_GET['page']!=1) && ($_GET['page']!='')){
?>
<a class="Prev" href="menu.php?page=<? echo $_GET['page']-1;?>">
<?
echo 'Prev';
?>
</a>
<?
}
echo '&nbsp;';
while($mulai<=$jml_page)
{
?>
<a href="menu.php?page=<? echo $mulai?>">
<?
if($_GET['page']==$mulai)
{
	?>
	<span class="this-page"><? echo $mulai;?></span>
	<?
	}
	else{?>
		<span><? echo $mulai;?></span>
		<?
		}
?>
</a>
<?
echo '&nbsp;';
$mulai++;
}
if($_GET['page']!=$jml_page)
{
?>
<a class="Next" href="menu.php?page=<? echo $_GET['page']+1;?>">
<?
echo 'Next';
?>
</a>
<?
}
echo '&nbsp;';
if($_GET['page']!=$jml_page){
?>
<a href="menu.php?page=<? echo $jml_page;?>">
<?
echo'Last';
}
?>
</div>
</div>
</div>
</article>
<aside class="sidebar">
<h3>Did You Know</h3>
<p><li><a href="en.wikipedia.org/wiki/Clove">Fact about Clove</a><br/>
Clove is the one of Betutu Secret ingredient.... </li>
<li><a href="http://en.wikipedia.org/wiki/Sambal">Sambal Matah including top ten hottest condiment</a><br/>
Sambal matah: Raw shallot & lemongrass sambal of Bali origin. It contains a lot of ... </li>
<li><a href="en.wikipedia.org/wiki/Nasi_goreng">Nasi Goreng = Indonesian Culture</a><br/>
Nasi goreng, literally meaning "fried rice" in Indonesian, can refer simply to fried pre-cooked rice, a meal including stir fried rice in small amount of cooking oil or ... </li>
</p>
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