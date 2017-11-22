<?php
session_start();
include('config/database.php');
include('image_functions.php');

$desc = $_POST['desc'];
$album = $_POST['album'];
$date = date("Y-m-d H:i:s");
$q = "INSERT INTO `tbl_photo` (`ID`, `Type`, `photo_thumb`, `photo_large`, `Descrioption`, `date`) VALUES (NULL, '$album', '', '', '$desc', '$date');";
//exit;
if(mysql_query($q))
	{
		$id = mysql_insert_id();
		$image = $id.'.jpg';
		$thumb = $id.'_thumb.jpg';
		if(ImgUpload('image','photos/',$image))
			{
				ImageResizeWithCrop(150,150,"photos/$image",'photos/thumb/'.$thumb);
				$q = "UPDATE `tbl_photo` SET `photo_thumb` = '$thumb', `photo_large` = '$image' WHERE `ID` = '$id'";
				mysql_query($q);
			}
		else mysql_query("DELETE FROM `tbl_photo` WHERE `ID` = '$id'");
	}

header("Location: bccms_photo.php");


?>