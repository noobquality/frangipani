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
				$tujuan='images/product/'.$nama_file_new;
				if(move_uploaded_file($_FILES["picture"]["tmp_name"],$tujuan))
				{
					$hasil=$nama_file_new;
					$get_extention2=explode('.',$_FILES["picture_detail"]["name"]);
					$jml2=count($get_extention2);
					$nama_file_new2=$_GET['id'].'.'.$get_extention2[$jml2-1];
					$tujuan2='images/product/detail/'.$nama_file_new2;
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
		$update=mysql_query("update products set product_name='".$_POST['product_name']."',category_id='".$_POST['category_id']."',description='".$_POST['description']."',price='".$_POST['price']."',picture='".$hasil."',picture_detail='".$hasil2."' where product_id='".$_GET['id']."'");
		if($update==true)
		{
			$msg='success';
		}
		else
		{
			$msg='fail';
		}
	}
	$product=mysql_query("select * from products where product_id='".$_GET['id']."'");
	$row_product=mysql_fetch_array($product);
?>
<html>
<head>
<?
include("includes/head2.php");
?>
<script type="text/javascript">
<?
if($msg=='success'){?>
	alert("Update Menu Success!");
<?}
else if($msg=='fail'){?>
	alert("Update Menu Failed!");
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
	<h2>Update Menu</h2><br>
	</div>
       <div style="margin:0px auto; width:960px;" align="center">
       	<form action="#" method="post" enctype="multipart/form-data">
        <table background="images/bg_noise.png" width="90%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';">
		<tr>
		<td><h6>Product Name</h6></td>
        <td><h6>:</h6></td>
        <td><input type="text" name="product_name" size="45" class="order_input" value="<? echo $row_product['product_name'];?>"/></td>
		<td rowspan="3" valign="top" align="center"><a class="fancyimage" href="images/product/detail/<? echo $row_product['picture_detail'];?>"><img class="image_table" src="images/product/<? echo $row_product['picture'];?>" width="150" height="150" border="1"></a></td>
        </tr>
        <tr>
		<td><h6>Category</h6></td>
        <td><h6>:</h6></td>
        <td>
		<select name="category_id" class="merah2"/>
        <?
        $category=mysql_query("select * from category order by category_name ");
			while($row_category=mysql_fetch_array($category))
				{
					if($row_product['category_id']==$row_category['category_id'])
						{?>
                            <option value="<? echo $row_category['category_id']?>"selected="selected"><? echo $row_category['category_name']?></option>
                                <?}
								else
								{?>
                                <option value="<? echo $row_category['category_id']?>"><? echo $row_category['category_name']?></option>
                                <?}
				}
        ?>
        </select>
		</td>
        </tr>
        <tr>
		<td><h6>Price</h6></td>
        <td><h6>:</h6></td>
        <td><input type="text" name="price" size="45" class="order_input" value="<? echo $row_product['price'];?>"/></td>
        </tr>
		<tr>
        <td valign="top"><h6>Description</h6></td>
        <td valign="top"><h6>:</h6></td>
        <td colspan="2"><textarea name="description" cols="40" rows="5" class="contact_textarea" /><? echo $row_product['description'];?></textarea></td>
        </tr>
        <tr>
		<td><h6>Picture</h6></td>
        <td><h6>:</h6></td>
        <td colspan="2">
		<input type="file" name="picture" class="merah"/>
		<input type="hidden" name="picture_old" value="<? echo $row_product['picture'];?>"/>
		</td>
		</tr>
		<tr>
		<td><h6>Picture Detail</h6></td>
        <td><h6>:</h6></td>
        <td colspan="2">
		<input type="file" name="picture_detail" class="merah"/>
		<input type="hidden" name="picture_detail_old" value="<? echo $row_product['picture_detail'];?>"/>
		</td>
		</tr>
		<tr>
        <td colspan="4" align="center">
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