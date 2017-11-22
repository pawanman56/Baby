<?php
session_start();
include('config/database.php');
include('image_functions.php');

$title = $_POST['title'];
$desc = $_POST['desc'];
$type = $_POST['type'];
$class = $_POST['class'];
$udate = date("Y-m-d H:i:s");

$q = "INSERT INTO `tbl_recipe`(`ID`, `Name`, `Class`, `Type`, `upload_date`, `Description`) VALUES (NULL, '$title', '$class', '$type', '$udate', '$desc');";
//mysql_query($q);

if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$thumb = $id.'_thumb.jpg';
		
		if(ImgUpload('image','photos/recipe/',$image))
			{
				ImageResizeWithCrop(150,150,"photos/recipe/$image","photos/recipe/thumb/$image_$thumb");
				$r = "INSERT INTO `album_recipe`(`id`, `recipe_id`, `photo_thumb`, `photo_large`, `desc`, `date`) VALUES (NULL, '$id', '$thumb', '$image', '', '$udate');";
				mysql_query($r);
				//var_dump();
				//exit;
			}
		//else mysql_query("DELETE FROM `album_recipe` WHERE `id` = '$id'");
	}
	
header("Location: bccms_recipe.php");
//echo mysql_error();
?>