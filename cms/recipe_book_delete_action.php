<?php

session_start();
include('config/database.php');

$id = $_GET['id'];
$q = "DELETE FROM `tbl_recipe_book` WHERE `id` = '$id'";

mysql_query($q);
header("Location: bccms_recipe_book.php");

?>