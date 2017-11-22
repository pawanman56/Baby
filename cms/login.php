<?php

session_start();
if(isset($_SESSION['login']) && $_SESSION['login']=='yes') header("Location:babycarecms.php");

//setcookie("username", "Pawan", time() +3600);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<style type="text/css">

body
{
	margin:0px auto;
	background-color:#FFFFFF;
	font-family:"Century Gothic", "Times New Roman", Times, serif;
}

.header
{
	margin:10px auto;
	height:auto;
	background-color:#F8BABE;
	width:400px;
}

.login
{
	margin:0px auto;
	width:auto;
	height:auto;
	padding:20px;
}

.login img
{
	margin:0px auto;
	height:90px;
	width:250px;
	padding-left:50px;
}

.login form
{
	margin:0px auto;
	width:auto;
	height:auto;
	padding-left:85px;
}

.login form .user
{
	margin:10px auto;
	width:180px;
	height:25px;
	text-align:center;
}

.login form .pass
{
	margin:10px auto;
	width:180px;
	height:25px;
	text-align:center;
}


.login form .log
{
	margin:10px auto;
	width:55px;
	height:30px;
	font-family:"Century Gothic", "Times New Roman", Times, serif;
	color:#303;
	text-align:center;
}
	
</style>

</head>

<body>

<div class="header">
	<div class="login">
		<img src="image/logo.png" />
        <form method="post" action="login_action.php">
			<input type="text" class="user" name="Username" placeholder="Enter Username" /><br />
			<input type="password" class="pass" name="Password" placeholder="Enter Password" /><br />
			<input type="submit" class="log" name="log_in" value="Log In" />
		</form>
        <br />
		<?php
			if(isset($_GET['error']) && $_GET['error'] == 'yes')
			{
				?>
				<div style="color:#FFF; text-align:left; margin-left:10px;">Username/Password Incorrect</div>
				<?php
			}
		?>
            
		<?php
			if(isset($_GET['error']) && $_GET['error'] == 'block')
			{
				$remaining = $_SESSION['block'] - strtotime(date("Y-m-d H:i:s"));
				if($remaining>0)
				{
					?>
					<div style="color:#FFF; text-align:left; margin-left:5px;">You're blocked. Please try again <?php echo $remaining; ?> seconds.</div>
					<?php
				}
			}
		?>
            
	</div>
</div>

</body>
</html>