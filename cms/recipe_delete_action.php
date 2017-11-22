<?php

session_start();
include('config/database.php');

$id = $_GET['id'];
$q = "DELETE FROM `tbl_recipe` WHERE `ID` = '$id'";

mysql_query($q);
header("Location: bccms_recipe.php");

?>