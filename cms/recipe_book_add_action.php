<?php
session_start();
include('config/database.php');
include('image_functions.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$class = $_POST['class'];
$udate = date("Y-m-d H:i:s");

$q = "INSERT INTO `tbl_recipe_book`(`id`, `Name`, `Class`, `Type`, `Description`, `upload_date`) VALUES ( NULL, '$title', '$class', '$type', '$desc', '$udate');";
//mysql_query($q);

if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$thumb = $id.'_thumb.jpg';
		
		if(ImgUpload('image','photos/recipe_book/',$image))
			{
				ImageResizeWithCrop(150,150,"photos/recipe_book/$image","photos/recipe_book/thumb/$image_$thumb");
				$r = "INSERT INTO `album_recipe_book`(`id`, `recipe_book_id`, `photo_thumb`, `photo_large`, `desc`, `date`) VALUES (NULL, '$id', '$thumb', '$image', '', '$udate');";
				mysql_query($r);
			}
	}

header("Location: bccms_recipe_book.php");
//echo mysql_error();
?>