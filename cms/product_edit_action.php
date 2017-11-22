<?php
session_start();
include('config/database.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$id = $_POST['id'];
$class = $_POST['class'];
$udate = date("Y-m-d H:i:s");

$q="UPDATE `babycare`.`tbl_products` SET `Name` = '$title', `Description` = '$desc', `Type` = '$type', `Class` = '$class', `upload_date` = '$udate' WHERE `tbl_products`.`ID` = '$id'";
//exit;
mysql_query($q);

header("Location: bccms_products.php");
//echo mysql_error();
?>