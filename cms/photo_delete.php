<?php
session_start();
include("config/database.php");
$id = $_GET['id'];
$q = "SELECT * FROM `tbl_photo` WHERE `ID` = '$id'";
$row = mysql_fetch_array(mysql_query($q));
if(mysql_query("DELETE FROM `tbl_photo` WHERE `ID` = '$id'"))
	{
		$large = "photos/".$row['photo_large'];
		
		$thumb = "photos/thumb/".$row['photo_thumb'];
		
		if(file_exists($large))unlink($large);
		if(file_exists($thumb))unlink($thumb);
	}
header("Location: bccms_photos.php?id=$row[album_id]");
?>