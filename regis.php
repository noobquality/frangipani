<?
include("includes/db.php");
$username	=    mysql_real_escape_string($_POST['username']);
$password	=    mysql_real_escape_string($_POST['password']);
$email   	=    mysql_real_escape_string($_POST['email']);
$phone   	=    mysql_real_escape_string($_POST['phone']);
$company 	=    mysql_real_escape_string($_POST['company']);
$address    =    mysql_real_escape_string($_POST['address']);
 
$password    =    base64_encode($password);
 
if(isset($_POST['regis']))
{
$frdate=explode("/",$_POST['frdate']);
$tgl=$frdate[2].'-'.$frdate[1].'-'.$frdate[0];
$query    =    "insert into user(username,password,birthday,email,phone,company,address)values('$username','$password','$tgl','$email','$phone','$company','$address')";
$regis    =    mysql_query($query);
header('location:successregister.php');
}
?>