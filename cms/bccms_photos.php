<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photos - BabyCare CMS</title>

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
    	<section style="padding:10px;"> 
		    <table>
    			<tr>
			      <td width="9%">S.No.</td>
			      <td width="66%">Photo Title</td>
	    		  <td width="25%">Action</td>
		    	</tr>
                
               	<?php
					$q = "SELECT * FROM `tbl_photo`";
					$result = mysql_query($q);
					$num = mysql_num_rows($result);
					for($i=1; $i<=$num; $i++)
					{
						$row = mysql_fetch_array($result);
					?>
				    <tr>
						<td><?php echo $i?></td>
						<td>
                        	<b><?php echo $row['Name'] ?></b><br />
                        	<img src="photos/thumb/<?php echo $row['photo_thumb']?>" height="200" width="200"><br>
							<?php echo $row['Description']?>
						</td>
						<td><a href="photo_edit.php?id=<?php echo $row['id']?>">Edit</a> | <a href="photo_delete.php?id=<?php echo $row['id'];?>" onClick="Javascript: return confirm('Are you sure?')">Delete</a></td>
					</tr>
					<?php
					}
				?>
                <tr>
                	<td>&nbsp;</td>
					<td style="padding:0px;">
                    	<form method="post" action="photo_add.php">
                	    	<input type="submit" name="add" value="Add Photo" style="font-family:'Century Gothic', 'Times New Roman', Times, serif; font-size:12px; margin:0px; margin-bottom:1px; padding:6px 0px;">
						</form>
                    </td>
                    <td>&nbsp;</td>
                </tr>
			</table>
		</section>
	</div>
</div>
<br clear="all" />

<?php include('includes/footer.php') ?>

</body>
</html>