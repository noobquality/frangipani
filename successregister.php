<html>
<head>
<?
include("includes/head.php");
?>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/sexyalertbox.v1.2.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="scripts/sexyalertbox.css"/>
<script language="javascript">
	function validatelogin(){
		var f=document.login;
		if(f.username.value==""){
			Sexy.alert('username is required');
			f.username.focus();
			return false;
		}
		var f=document.login;
		if(f.password.value==""){
			Sexy.alert('password is required');
			f.password.focus();
			return false;
		}
		return;
	}
</script>
<script language="javascript">
	function validateregis(){
		var f=document.register;
		if(f.username.value==""){
			Sexy.alert('username is required');
			f.username.focus();
			return false;
		}
		var f=document.register;
		if(f.password.value==""){
			Sexy.alert('password is required');
			f.password.focus();
			return false;
		}
		var f=document.register;
		if(f.phone.value==""){
			Sexy.alert('phone is required');
			f.phone.focus();
			return false;
		}
		return;
	}
</script>
</head>
<body>
<div id="header">
    <nav>
    <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    </nav>
</div>
<div id="container">
    <header>
        <hgroup class="intro">
          <h1 class="title">Great !!!</h1>
          <h3 class="tagline">Now, try to Login!</h3>
        </hgroup>
	</header>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <footer>
        <div class="border"></div>
        <div class="footer-widget">
          <h4>Login</h4>
           <div class="contact_form">
                 <form name="login" onSubmit="return validatelogin()" action="logcheck.php" method="post">
					<div class="form_row">
                    <label><strong>Username :</strong></label>
                    <input type="text" name="username" class="order_input" />
                    </div>  
                    <div class="form_row">
                    <label><strong>Password :</strong></label>
                    <input type="password" name="password" class="order_input" />
                    </div>                     
                    <div class="form_row">
                    <input type="submit" class="login" value="login" />
					&nbsp;&nbsp;&nbsp;
					<input type="reset" class="login" value="reset" />
                    </div>
                    <?
                    	if($_GET['err']!='')
								  {
									  ?>
									  	<tr>
                                        <td colspan="3" align="center">
									  <? echo $_GET['err'];?>
                                      </td>
                                      </tr>
                                      <?
									  
									}
					?> 	
                  </form>     
                </div>
        </div>
        <div class="footer-widget">
          <h4>Register</h4>
			<div class="contact_form">
                 <form name="register" onSubmit="return validateregis()" action="regis.php" method="post">          
                    <div class="form_row">
                    <label><strong>Username :</strong></label>
                    <input type="text" name="username" class="order_input" />
                    </div>  
                    <div class="form_row">
                    <label><strong>Password :</strong></label>
                    <input type="password" name="password" class="order_input" />
                    </div> 
                   <div class="form_row">
                    <label><strong>Phone :</strong></label>
                    <input type="text" name="phone" class="order_input" />
                    </div>
                    <div class="form_row">
                    <label><strong>Address :</strong></label>
                    <input type="text" name="address" class="order_input" />
                    </div>
                    <div class="form_row">
                    <label><strong>Email :</strong></label>
                    <input type="text" name="email" class="order_input" />
                    </div>
                    <div class="form_row">
                    <label><strong>Company :</strong></label>
                    <input type="text" name="company" class="order_input" />
                    </div>
                    <div class="form_row">
                    <input type="submit" name="regis" id="regis" class="regis" value="register" />
                    </div>   
                  </form>     
                </div>  
        </div>
		<div class="footer-widget">
		<h4>Join Us!</h4>
		<div class="contact_form">
          <img src="images/home/10.jpg" width="250" alt="" />
          <p>Join with us is easy! There are no special requirements or membership fees, you don't even have to learn a secret handshake. But you do get special benefits. That's because we save some of the best deals and discounts for our friends. You might get a great members-only coupon, or cool merchandise at an exclusive discount. And you'll definitely get a fun treat on your birthday! All you have to do is enter a little information, then sit back and enjoy the goodies. And don't worry. We'll keep all your information to ourselves. We're selfish like that.</p>
        </div>
		</div>
        <div class="border2"></div>
        <br />
		<?
		include("includes/footer.php");
		?>
        </footer>
    </div>
</body>
</html>