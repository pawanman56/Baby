<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

$userid = $_SESSION['user_id'];
$q = "SELECT * FROM tbl_users WHERE id = '$userid'";
$result = mysql_query($q);
$row = mysql_fetch_array($result);
//$id = $_GET['user_id'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password - BabyCare CMS</title>

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
    	<h1 style="margin:0px; margin-bottom:2px; padding:0px; padding-top:5px; padding-left:20px;">Change Password</h1>
        <?php
			if(isset($_GET['error']) && $_GET['error'] == 'yes')
			{
				?>
				<div style="color:#003; text-align:left; margin-left:10px;">Password Incorrect</div>
				<?php
			}
		?>
         <?php
			if(isset($_GET['error']) && $_GET['error'] == 'no')
			{
				?>
				<div style="color:#003; text-align:left; margin-left:10px;">Password Changed</div>
				<?php
			}
		?>
    	<section>
			<form method="post" action="change_password_action.php" name="change_password" id="change_password" style="float:left; margin:0px 20px;">
				<table>
					<tr>
        		  		<td width="22%">Password</td>
        		  		<td width="78%"><input type="password" name="pre_password" id="pre_password"></td>
        			</tr>
        			<tr>
        		  		<td width="22%">New Password</td>
        		  		<td width="78%"><input type="password" name="new_password" id="new_password"></td>
        			</tr>
		        	<tr>
        		  		<td width="22%">Confirm Password</td>
        		  		<td width="78%"><input type="password" name="conf_new_password" id="conf_new_password"></td>
        			</tr>
        			<tr>
						<td>&nbsp;</td>
						<td style="padding:0px;">
            		    	<input type="submit" value="Change" style="font-family:'Century Gothic', 'Times New Roman', Times, serif; font-size:12px; margin-left:5px; margin-bottom:2px; padding:7px;">
						</td>
    		    	</tr>
				</table>
    		</form>
    	</section>
	</div>
</div>
<br clear="all" />

<?php include('includes/footer.php') ?>

</body>
</html>