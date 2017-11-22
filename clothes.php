<?php
session_start();
include('cms/config/database.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Garments Shopping - BabyCare.com</title>
<link rel="stylesheet" type="text/css" href="css/homepage.css" />
</head>

<body>

<?php
	include("php_include/header.php");
?>
<div class="field">
	<?php
		include("php_include/navigation.php");
	?>
    
    <div class="contents">
    	<div class="shop_title">
                	<img class="shop_title" src="images/shop/clothes.png" />
        </div>
        <div class="news_feed1" style="margin-top:20px; padding-left:20px;">
        <?php
			$q = "SELECT * FROM `tbl_products` ORDER BY `upload_date` DESC"; //WHERE `Class` = 'featured'";
			$result = mysql_query($q);
			$num = mysql_num_rows($result);
			for($i=1;$i<=$num;$i++)
			{
				$row = mysql_fetch_array($result);
				$id = $row['ID'];
				$h1 = $row['Name'];
				$desc = $row['Description'];
				?>
				<div class="shop_story_toy">
                	<?php
					$r = "SELECT * FROM `album_product` WHERE `product_id` = '$id'";
					$photo = mysql_fetch_array(mysql_query($r));
					//echo var_dump($photo);
					$dispic = $photo['photo_large'];
					$lar_img = 'cms/photos/products/'.$dispic;
					?>
                    <center>
                    <img src="<?php echo $lar_img?>" /></center>
                    <div class="shop_story_toy_detail">
                		<h1><?php echo $h1?></h1>
                    	<p><?php echo $desc?></p>
                    </div>
				</div>
				<?php
			}
		?>
        </div>
        <br clear="all" />
	</div>
</div>
<?php
	include("php_include/footer.php");
?>

</body>
</html>