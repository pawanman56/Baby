<?php
session_start();
include('cms/config/database.php');

$search = $_POST['searching'];

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
        <div class="news_feed1" style="margin-top:20px; padding-left:20px;">
        <?php
			$q = "SELECT * FROM `tbl_recipe` WHERE `Name` LIKE '%$search%'";
			$result = mysql_query($q);
			$num = mysql_num_rows($result);
			if($num == 0)
			{
				?>
                <h1 style="font-family:Century Gothic; text-align:center; font-weight:bold; color:#003; font-size:16px; padding-top:20px;">
                	No Matches.<br /><br />
                    No items matching '<?php echo $search?>'.
                </h1>
                <?php
			}
			else
			{
				for($i=1;$i<=$num;$i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['ID'];
					$name = $row['Name'];
					$desc = $row['Description'];
					$class = $row['Class'];
					$type = $row['Type'];
					?>
					<div class="shop_story_toy" style="margin:5px 2px;">
            	    	<?php
						$r = "SELECT * FROM `album_recipe` WHERE `recipe_id` = '$id'";
						$photo = mysql_fetch_array(mysql_query($r));
						$dispic = $photo['photo_large'];
						$lar_img = 'cms/photos/recipe/'.$dispic;
						?>
            	        <center>
            	        <img src="<?php echo $lar_img?>" /></center>
            	        <div class="shop_story_toy_detail">
            	    		<h1><?php echo $name?></h1>
            	            <h1>&bull;<?php echo $class?></h1>
            	            <h1>&bull;<?php echo $type?></h1>
            	        	<p><?php echo $desc?></p>
            	        </div>
					</div>
					<?php
				}
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