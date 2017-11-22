<?php

session_start();
include('config/database.php');

$id = $_GET['id'];
$q = "DELETE FROM `tbl_toys` WHERE `id` = '$id'";

mysql_query($q);
header("Location: bccms_toys.php");

?>