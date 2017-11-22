<?php
session_start();
include('config/database.php');
$username = $_POST['Username'];
$password = $_POST['Password'];


$q = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";

$result = mysql_query($q);

$num = mysql_num_rows($result);

if($num==0)
	{
		header("Location: login.php?err=yes");
		exit;
	}
else
	{
		$row = mysql_fetch_array($result);
		//echo $row['email'];
		$_SESSION['username'] = $username;
		//$_SESSION['fullname'] = "$row[firstname] $row[middlename] $row[lastname]";
		
		$_SESSION['user_id'] = $row['id'];
		
		$_SESSION['login'] = 'yes';
		header("Location: babycarecms.php");
	}

?>