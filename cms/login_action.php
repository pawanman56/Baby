<?php

session_start();

include('config/database.php');

/*$user = 'Pawan';
$pass = 'pawan';*/

$username = $_POST['Username'];
$password = $_POST['Password'];	
var_dump($_SESSION);

$q = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
$result = mysql_query($q);
$num = mysql_num_rows($result);

/*else
{
	
}*/

if(isset($_SESSION['login_attempts']) && $_SESSION['login_attempts']>4)
{
	if(!isset($_SESSION['block']))
	{
		$_SESSION['block'] = strtotime(date("Y-m-d H:i:s")) + 300;
	}
	
	if(strtotime(date("Y-m-d H:i:s")) > $_SESSION['block'])
	{
		unset($_SESSION['login_attempts']);
		unset($_SESSION['block']);
	}
	else
	{
		header("Location: login.php?error=block");
		exit;
	}
}

$row = mysql_fetch_array($result);
	
if($row['username']==$username && $row['password']==$password)
{
	if($num==0)
	{
		die('No DB.');
	}

	else
	{
		unset($_SESSION['login_attempts']);
		unset($_SESSION['block']);
		$_SESSION['login'] = 'yes';
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		
		header("Location: babycarecms.php");
	}
}
else 
{
	if(!isset($_SESSION['login_attempts']))
		$_SESSION['login_attempts']=1;
	else
		$_SESSION['login_attempts']++;
		
	header("Location: login.php?error=yes");
}

?>