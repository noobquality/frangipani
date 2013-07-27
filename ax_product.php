<?
include('includes/session.php');
if($_GET['category']=='')
{
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
	if(mysql_num_rows($result)==0)
	{
		?>
			<br /><br /><h6>No Product in this Category!</h6><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<?
	}
	else
	{
		?>
		<table>
		<?
		while($row=mysql_fetch_array($result)){
		?>
			<tr>
			<td><a class="fancyimage" href="images/product/detail/<? echo $row['picture_detail']?>"><img src="images/product/<? echo $row['picture']?>" class="left clear item" width="150" height="150"></a></td>
			<td><h6><? echo $row['product_name']?>  $<? echo $row['price']?></h6>
				<p><? echo $row['description']?></p><br />
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
		<?}
		}
else
{
	$result=mysql_query("select * from products where category_id='".$_GET['category']."'");
	if(mysql_num_rows($result)==0)
	{
		?>
			<br /><br /><h6>No Product in this Category!</h6><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<?
	}
	else
	{
		?>
		<table>
		<?
		while($row=mysql_fetch_array($result)){
		?>
		<tr>
		<td><a class="fancyimage" href="images/product/detail/<? echo $row['picture_detail']?>"><img src="images/product/<? echo $row['picture']?>" class="left clear item" width="150" height="150"></a></td>
		<td><h6><? echo $row['product_name']?>  $<? echo $row['price']?></h6>
			<p><? echo $row['description']?></p><br />
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
		<?}
}
?>