<?php 
	include('config/database.php');
?>

<div class="header">
	<div class="head">
	    <div class="img">
			<a href="babycarecms.php"><img src="image/cms_in.png" /></a>
		</div>
	    <div class="logout">
	    	<ul>
	        	<li><a href="log_out.php" style="float:right;">log Out</a><br /></li>
				<li>
                <?php
					$userid = $_SESSION['user_id'];
					$q = "SELECT * FROM tbl_users WHERE id = '$userid'";
					$result = mysql_query($q);
					$row = mysql_fetch_array($result);
					echo $row['email'];
				?>
				</li>
	        </ul>
	    </div>
	</div>
</div>
