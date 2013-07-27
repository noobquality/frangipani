<? session_start();
include ("includes/session.php");
if (isset($_POST['submit'])) {
    $insert = mysql_query("insert into contact (name,subject,email,message) values('".$_POST['name']."','".$_POST['subject']."','".$_POST['email']."','".$_POST['message']."')");
    if ($insert == true) {
        $msg = 'success';
    } else {
        $msg = 'fail';
    }
} ?> 
<html> 
<head> 
<? include ("includes/head.php"); ?> 
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/sexyalertbox.v1.2.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="scripts/sexyalertbox.css"/>
<script type="text/javascript"> 
<?
if ($msg == 'success') { ?> alert("Your Message Has Been Sent To Us!"); <?
} else if ($msg == 'fail') { ?> alert("Your Message Failed"); <?
} ?> 
</script>
<script language="javascript">
	function validate(){
		var f=document.contact;
		if(f.name.value==""){
			Sexy.alert('Name is required');
			f.name.focus();
			return false;
		}
		var f=document.contact;
		if(f.subject.value==""){
			Sexy.alert('Subject is required');
			f.subject.focus();
			return false;
		}
		var f=document.contact;
		if(f.message.value==""){
			Sexy.alert('Message is required');
			f.message.focus();
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
        <li><a href="index.php">Home</a> 
        </li> 
        <li><a href="about.php">About</a> 
        </li> 
        <li><a href="menu.php">Menu</a> 
        </li> 
        <li><a href="gallery.php">Gallery</a> 
        </li> 
        <li><a href="contact.php" class="current">Contact</a> 
        </li> 
    </ul> 
    </nav> 
</div> 
<div id="container"> 
    <? include ("includes/user.php"); ?> 
    <div class="wrapper" style="font-color:#9c5959"> 
        <div class="border"> 
        </div> 
        <article> 
        <h3>Contact Us!</h3> 
        <iframe width="625" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=id&amp;geocode=&amp;q=frangipani+restaurant+bali&amp;aq=&amp;sll=-8.469469,115.348195&amp;sspn=1.589183,2.469177&amp;ie=UTF8&amp;start=10&amp;hq=frangipani+restaurant&amp;hnear=Bali&amp;t=m&amp;cid=15690644604577751854&amp;ll=-8.622181,115.137234&amp;spn=0.029701,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed">
        </iframe> 
        <br/> 
        <blockquote> 
            <strong>If you lost, says "MAP" like dora in dora the explorer say's, but in case you want to contact us or jut wanna tell us your secret, field the form below.</strong> 
        </blockquote> 
        <form name="contact" action="#" onSubmit="return validate()" method="post" enctype="multipart/form-data"> 
            <table border="0" background="images/bg_noise.png" width="40%" cellspacing="10px" cellpadding="10px" style="font-size:20px font-family='Lobster13Regular';"> 
            <tr> 
                <td> 
                    <h6>Name</h6> 
                </td> 
                <td> 
                    <h6>:</h6> 
                </td> 
                <td> 
                    <input type="text" name="name" class="order_input"/> 
                </td> 
            </tr> 
            <tr> 
                <td> 
                    <h6>Subject</h6> 
                </td> 
                <td> 
                    <h6>:</h6> 
                </td> 
                <td> 
                    <input type="text" name="subject" class="order_input"/> 
                </td> 
            </tr> 
            <tr> 
                <td> 
                    <h6>Email</h6> 
                </td> 
                <td> 
                    <h6>:</h6> 
                </td> 
                <td> 
                    <input type="text" name="email" class="order_input"/> 
                </td> 
            </tr> 
            <tr> 
                <td> 
                    <h6>Message</h6> 
                </td> 
                <td> 
                    <h6>:</h6> 
                </td> 
                <td> 
                    <textarea cols="40" rows="8" name="message" class="contact_textarea2"></textarea> 
                </td> 
            </tr> 
            <tr> 
                <td colspan="3" align="center"> 
                    <input class="button" type="submit" name="submit" value="submit"/>&nbsp;&nbsp;&nbsp; <input class="button" type="reset" name="reset" value="reset"/>
                </td> 
            </tr> 
            </table> 
        </form> 
        <br> 
        <br> 
        <br> 
        </article> 
        <aside class="sidebar"> 
        <h3>All Is Well</h3> 
        <img src="images/home/6.jpg" width="300" alt=""/> 
        <p> 
            People from all over the world (maybe little exaggerating, most are from Australia) don't go here for the ambiance, they go because of the quality of the food.
        </p> 
        <br> 
        <h3>We Are Social</h3> 
        <? include ("includes/social.php"); ?> 
        </aside> 
        <div class="border2"> 
        </div> 
        <br> 
    </div> 
    <footer> 
    <? include ("includes/footer.php"); ?> 
    </footer> 
</div> 
</body> 
</html>