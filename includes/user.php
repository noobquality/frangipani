<div id="welcometext" align="right">
<?
if($_SESSION['fangipani']!=''){
	if($row_user['type']=='admin'){?>
		<a class="hr-acc" href="myaccount.php?username=<? echo $row_user["username"];?>"><img src="images/admin.png" height="35" /></a>
		<?}
		else{?>
		<a class="hr-acc" href="myaccount.php?username=<? echo $row_user["username"];?>"><img src="images/user.png" height="35" /></a>
		<a class="hr-acc" href="shoppingcart.php"><img src="images/cart.png" height="35" /></a>
		<? }
		echo $_SESSION['fangipani'];
		} ?>
</div>