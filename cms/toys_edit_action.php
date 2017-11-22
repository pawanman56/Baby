<?php
session_start();
include('config/database.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$id = $_POST['id'];
$udate = date("Y-m-d H:i:s");

$q="UPDATE `tbl_toys` SET `Name` = '$title', `Description` = '$desc', `Type` = '$type', `upload_date` = '$udate' WHERE `id` = '$id'";
//exit;
mysql_query($q);

header("Location: bccms_toys.php");
//echo mysql_error();
?>