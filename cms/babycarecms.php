<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - BabyCare CMS</title>

<link rel="stylesheet" type="text/css" href="cms.css" /> 

</head>

<body>

<?php
	include('includes/header.php');
?>

<div class="content">
	<?php 
		include('includes/navigation.php');
	?>
    
    <div class="table">
    	<div class="welcome">
        	<p>
            	<h1>Welcome</h1><br />
                <h2><?php
					$userid = $_SESSION['user_id'];
					$q = "SELECT * FROM tbl_users WHERE id = '$userid'";
					$result = mysql_query($q);
					$row = mysql_fetch_array($result);
					echo $row['firstname'].' '.$row['lastname'];
				?></h2></h2><br />
                Now you can manage contents of your webpages from this panel. And for further control and edit the contents.<br />
                <br />Happy editing.
            </p>
        </div>
	</div>
</div>
<br clear="all" />

<?php include('includes/footer.php') ?>

</body>
</html>