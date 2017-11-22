<?php
session_start();

$gender = $_POST['type'];
var_dump($_SESSION);

if($gender == "Boys")
{
	$_SESSION['boy'] = 'yes';
	header("Location: test.php");
}

else if($gender == "Girls")
{	
	$_SESSION['girl'] = 'yes';
	header("Location: test.php");
}

else
	exit;

?>