<?php
session_start();
include('config/database.php');

$search = $_POST['searching'];
$q = "SELECT FROM `tbl_recipe` WHERE `Name` LIKE '$search'";
$result = mysql_query($q);
$num = mysql_num_rows($result);
for($i=1;$i<=$num;$i++)
{
	$row = mysql_fetch_array($result);
	$name = $row['Name'];
	$desc = $row['Description'];
	$class = $row['Class'];
	$type = $row['Type'];
	
}

?>