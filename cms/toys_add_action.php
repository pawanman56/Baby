<?php
session_start();
include('config/database.php');
include('image_functions.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$userid = $_SESSION['user_id'];
$udate = date("Y-m-d H:i:s");

$q="INSERT INTO `tbl_toys`(`id`, `Name`, `Type`, `Description`, `upload_date`) VALUES (NULL, '$title', '$type', '$desc', '$udate');";
//mysql_query($q);

if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$thumb = $id.'_thumb.jpg';
		
		if(ImgUpload('image','photos/toy/',$image))
			{
				ImageResizeWithCrop(150,150,"photos/toy/$image","photos/toy/thumb/$image_$thumb");
				$r = "INSERT INTO `album_toys`(`id`, `toy_id`, `photo_thumb`, `photo_large`, `desc`, `date`) VALUES (NULL, '$id', '$thumb', '$image', '', '$udate');";
				mysql_query($r);
			}
	}

header("Location: bccms_toys.php");
//echo mysql_error();
?>