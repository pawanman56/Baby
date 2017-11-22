<?php
session_start();
include('config/database.php');
include('image_functions.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$class = $_POST['class'];
$userid = $_SESSION['user_id'];
$udate = date("Y-m-d H:i:s");

$q="INSERT INTO `tbl_products`(`ID`, `Name`, `Type`, `Class`, `Description`, `upload_date`) VALUES (NULL, '$title', '$type', '$class', '$desc', '$udate');";
//mysql_query($q);

if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$thumb = $id.'_thumb.jpg';
		
		if(ImgUpload('image','photos/products/',$image))
			{
				ImageResizeWithCrop(150,150,"photos/products/$image","photos/products/thumb/$image_$thumb");
				$r = "INSERT INTO `album_product`(`id`, `product_id`, `photo_thumb`, `photo_large`, `desc`, `date`) VALUES (NULL, '$id', '$thumb', '$image', '', '$udate');";
				mysql_query($r);
			}
	}

header("Location: bccms_products.php");
//echo mysql_error();
?>