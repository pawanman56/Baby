<?php
session_start();
include('config/database.php');

$password = $_POST['password'];
$new_password = $_POST['new_password'];
$conf_new_password = $_POST['conf_new_password'];
$userid = $_SESSION['user_id'];

if($password == $row['username'] && $conf_new_password == $new_password && $new_password != $password)
{
	$q="UPDATE `tbl_users` SET `password` = '$new_password' WHERE id = '$userid'";
	header("Location: change_password.php?error=no");
}

else
{
	header("Location: change_password.php?error=yes");
}

mysql_query($q);

//echo mysql_error();
?>