<?php
session_start();
include('cms/config/database.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - BabyCare.com</title>
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
	
    <?php
		include("php_include/index_banner.php");
	?>
    
    <div class="recommended">
   		<img class="text" src="images/recommended.jpg"/>
        <?php
    		$qr = "SELECT * FROM `tbl_recipe` WHERE `Class` = 'recommended' ORDER BY `upload_date` DESC";
			$res = mysql_query($qr);
			$no = mysql_num_rows($res);
			for($j=1;$j<=$no;$j++)
			{
				$rows = mysql_fetch_array($res);
				$ids = $rows['ID'];
				$hd1 = $rows['Name'];
				$dcrp = $rows['Description'];
				?>
                	<?php
					$qrr = "SELECT * FROM `album_recipe` WHERE `recipe_id` = '$ids'";
					$pic = mysql_fetch_array(mysql_query($qrr));
					$dpic = $pic['photo_large'];
					$largeimg = 'cms/photos/recipe/'.$dpic;
					?>
                    <img src="<?php echo $largeimg?>" />
				<?php
			}
		?>
    </div>
    <div class="featured">
    	<img src="images/featured.png" />
    </div>
	<div class="contents">
    	<div class="news_feed1">
        <?php
			$q = "SELECT * FROM `tbl_recipe` WHERE `Class` = 'featured' ORDER BY `upload_date` DESC";
			$result = mysql_query($q);
			$num = mysql_num_rows($result);
			for($i=1;$i<=$num;$i++)
			{
				$row = mysql_fetch_array($result);
				$id = $row['ID'];
				$h1 = $row['Name'];
				$desc = $row['Description'];
				?>
				<div class="news_feed1_img">
                	<?php
					$r = "SELECT * FROM `album_recipe` WHERE `recipe_id` = '$id'";
					$photo = mysql_fetch_array(mysql_query($r));
					//echo var_dump($photo);
					$dispic = $photo['photo_large'];
					$lar_img = 'cms/photos/recipe/'.$dispic;
					?>
                    <img src="<?php echo $lar_img?>" />
				</div>
                <div class="news_feed1_story">
                	<h1><?php echo $h1?></h1>
                    <p><?php echo $desc?></p>
				</div>
                <br clear="all" />
				<?php
			}
		?>
        </div>
        
    </div>
</div>

<?php
	include("php_include/footer.php");
?>

</body>
</html>
