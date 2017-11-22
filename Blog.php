
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Our Blog - BabyCare.com</title>
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
	<div>
    	<img src="images/footer/our_blog.png"/>
	</div>
	<div class="contents">
    	<?php
			include("php_include/blog.php");
		?>
	</div>
	<br clear="all" />
</div>
<?php
	include("php_include/footer.php");
?>

</body>
</html>
