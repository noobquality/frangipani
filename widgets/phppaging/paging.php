<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SPA Paging Style</title>
<link type="text/css" href="paging.css" rel="stylesheet" media="screen" />
</head>
<body>

<?php
include_once("paging.class.php"); // include the paging class

/* database connectivity */
mysql_connect("localhost","root","");
mysql_select_db("db_wikitime");

$sql = "select * from comments"; //your sql statement

$pg1 = new spa_paging; //create an instance of paging class
$sql = $pg1->pagingSql($sql); //parse the sql thru paging class

?>
<table>
	<tr>
		<td><p>Style 1: </p></td>
		<td><p>Style 2: </p></td>
		<td><p>Style 3: </p></td>
		<td><p>Style 4: </p></td>
	</tr>
	<tr>
		<td><?php echo $pg1->getInfo();?></td>
		<td>
		<?php
			$pg1->className = "SPA_PgS2";
			echo $pg1->getInfo();
		?>
		</td>
		<td>
		<?php
			$pg1->className = "SPA_PgS3";
			echo $pg1->getInfo();
		?>
		</td>
		<td>
			<?php
				$pg1->className = "SPA_PgS4";
				echo $pg1->getInfo();
			?>
		</td>
	</tr>
</table>

<h3>Implementing the paging with your SQL query:</h3>
<?php

$resultRes = mysql_query($sql);
while($row = mysql_fetch_assoc($resultRes) )
{
	echo ++$i . " ) " . $row['commentText'] . "<br />";
}
?>
<h3>Demonstration of using multiple paging classes on same page:</h3>
<h5>This demo uses table name instead of Custom SQL script</h5>
<?php
//$sql2 = "select * from comments"; //your sql statement
$pg2 = new spa_paging; //create an instance of paging class with a different name
$pg2->tableName = "comments"; //note the use of tale name instead of SQL query

$pg2->pageVar = "p"; //this is very important when using the second paging class
$pg2->pageSize = 4;
$sql2 = $pg2->pagingSql(); //parse the sql thru paging class
echo $pg2->getInfo();
echo "<br />";
$resultRes2 = mysql_query($sql2);
while($row2 = mysql_fetch_assoc($resultRes2) )
{
	echo ++$j . " ) " . $row2['commentText'] . "<br />";
}
?>
</body>
</html>