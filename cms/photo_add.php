<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

/*$id = $_GET['ID'];
$q = "SELECT * FROM `tbl_photo` WHERE `ID` = '$id'";
$result = mysql_query($q);
$row = mysql_fetch_array($result);
//echo mysql_error();
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Photo - BabyCare CMS</title>

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
		<h1 style="margin:0px; padding:0px; padding-top:5px; padding-left:20px;">Update Photo</h1>
    	<section>
    	
			<form method="post" action="photo_add_action.php" name="photo_add" id="photo_add" enctype="multipart/form-data">
      			<table width="100%" border="0" cellspacing="1" cellpadding="0" class="tablelist">
					<tr>
						<td width="22%">Image</td>
						<td width="78%"><input type="file" name="image" id="image"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea name="desc" cols="50" rows="10" id="desc"></textarea></td>
					</tr>
					<tr>
          				<td>Album</td>
          				<td>
                        	<select name="album" id="album">
          					<!--<?php
								$userid = $_SESSION['user_id'];
								$result=mysql_query("SELECT * FROM `tbl_albums` WHERE user_ID = '$userid' ORDER BY `title`");
								$num = mysql_num_rows($result);
		  						for($i=1; $i<=$num; $i++)
		  						{
									$row = mysql_fetch_array($result);
		  							?>
          							<option value="<?php echo $row['ID']?>"><?php echo $row['Name']?></option>
          							<?php
								}
		  					?>!-->
                            	<option>Recipe</option>
                                <option>Book</option>
                                <option>Toy</option>
                                <option>Product</option>
          					</select>
						</td>
        			</tr>
        			<tr>
						<td>&nbsp;</td>
						<td style="padding:0px;">
            		    	<input type="submit" value="Upload" style="font-family:'Century Gothic', 'Times New Roman', Times, serif; font-size:12px; margin-left:5px; margin-bottom:2px; padding:7px;">
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