<?php
session_start();
include('cms/config/database.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>It's Shopping Time - BabyCare.com</title>
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
		include("php_include/shop_banner.php");
	?>
    <div class="contents">
    	<div class="shop_title">
                	<img class="shop_title" src="images/shop/toys.png" />
        </div>
        <div class="news_feed1" style="margin-top:20px; padding-left:20px;">
        <?php
			$q = "SELECT * FROM `tbl_toys` ORDER BY `upload_date` DESC"; //WHERE `Class` = 'featured'";
			$result = mysql_query($q);
			$num = mysql_num_rows($result);
			for($i=1;$i<=$num&&$i<=4;$i++)
			{
				$row = mysql_fetch_array($result);
				$id = $row['id'];
				$h1 = $row['Name'];
				$desc = $row['Description'];
				?>
				<div class="shop_story_toy">
                	<?php
					$r = "SELECT * FROM `album_toys` WHERE `toy_id` = '$id'";
					$photo = mysql_fetch_array(mysql_query($r));
					//echo var_dump($photo);
					$dispic = $photo['photo_large'];
					$lar_img = 'cms/photos/toy/'.$dispic;
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
        <div class="shop_link">
        	<ul>
        		<li><a href="toys.php"> Click Here For More Toys</a></li>
        	</ul>
        </div>
        <br clear="all" />
        <br />
        <div class="shop_title">
                	<img class="shop_title" src="images/shop/clothes.png" />
        </div>
        <div class="news_feed1" style="margin-top:20px; padding-left:20px;">
   	    <?php
			$qr = "SELECT * FROM `tbl_products` ORDER BY `upload_date` DESC"; //WHERE `Class` = 'featured'";
			$rsult = mysql_query($qr);
			$nm = mysql_num_rows($rsult);
			for($j=1;$j<=$num&&$j<=4;$j++)
			{
				$rw = mysql_fetch_array($rsult);
				$ids = $rw['ID'];
				$hd = $rw['Name'];
				$dsc = $rw['Description'];
				?>
				<div class="shop_story_toy">
                	<?php
					$qrs = "SELECT * FROM `album_product` WHERE `product_id` = '$ids'";
					$pht = mysql_fetch_array(mysql_query($qrs));
					//echo var_dump($photo);
					$dspic = $photo['photo_large'];
					$lr_img = 'cms/photos/products/'.$dspic;
					?>
                    <center>
                    <img src="<?php echo $lr_img?>" /></center>
                    <div class="shop_story_toy_detail">
                		<h1><?php echo $hd?></h1>
                    	<p><?php echo $dsc?></p>
                    </div>
				</div>
				<?php
			}
		?>
        </div>
        <div class="shop_link">
        	<ul>
        		<li><a href="clothes.php">Click Here For More Clothes</a></li>
        	</ul>
        </div>
        <br clear="all" /><br />
        <div class="shop_title">
                	<img width="150px" src="images/shop/nike.png" />
        </div>
        <div class="news_feed1" style="margin-top:20px; padding-left:20px;">
        <?php
			$s = "SELECT * FROM `tbl_products` WHERE `Class` = 'nike' OR 'Nike' ORDER BY `upload_date` DESC";
			$reslt = mysql_query($s);
			$nms = mysql_num_rows($reslt);
			for($k=1;$k<=$num&&$k<=4;$k++)
			{
				$rws = mysql_fetch_array($reslt);
				$idss = $rws['ID'];
				$head = $rws['Name'];
				$dscp = $rws['Description'];
				?>
				<div class="shop_story_toy">
                	<?php
					$sr = "SELECT * FROM `album_product` WHERE `product_id` = '$idss'";
					$phts = mysql_fetch_array(mysql_query($sr));
					//echo var_dump($photo);
					$dspics = $phts['photo_large'];
					$larg_img = 'cms/photos/products/'.$dspics;
					?>
                    <center>
                    <img src="<?php echo $larg_img?>" /></center>
                    <div class="shop_story_toy_detail">
                		<h1><?php echo $head?></h1>
                    	<p><?php echo $dscp?></p>
                    </div>
				</div>
				<?php
			}
		?>
        </div>
        <div class="shop_link">
        	<ul>
        		<li><a href="nike.php">Click Here For More Nike Products</a></li>
        	</ul>
        </div>
        <br clear="all" /><br />
    </div>
</div>

<?php
	include("php_include/footer.php");
?>

</body>
</html>
