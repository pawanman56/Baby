<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

$id = $_GET['id'];
$q = "SELECT * FROM `tbl_photo` WHERE `ID` = '$id'";
$result = mysql_query($q);
$row = mysql_fetch_array($result);
//echo mysql_error();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Photo - BabyCare CMS</title>

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
    	
			<form method="post" action="photo_edit_action.php" name="photo_edit" id="photo_edit" style="float:left; margin:0px 20px;">
            	<input type="hidden" name="id" value="<?php echo $id ?>">
				<table>
                <?php
				$q = "SELECT * FROM `tbl_photo` WHERE `ID` = '$id'";
				$result = mysql_query($q);
				$row = mysql_fetch_array($result);
				{
					?>
					<tr>
        		  		<td width="22%">Photo Name</td>
        		  		<td width="78%"><input type="text" name="title" id="title" value="<?php echo $row['Name']?>"></td>
        			</tr>
        			<tr>
						<td>Description</td>
						<td><textarea name="desc" cols="50" rows="10" id="desc"></textarea></td>
					</tr>
		        	<tr>
						<td>Type</td>
						<td><select name="type" id="type">
								<option <?php if($row['Type']=='Recipe')echo 'selected'?>>Recipe</option>
								<option <?php if($row['Type']=='Book')echo 'selected'?>>Book</option>
                                <option <?php if($row['Type']=='Toy')echo 'selected'?>>Toy</option>
                                <option <?php if($row['Type']=='Product')echo 'selected'?>>Product</option>
							</select>
						</td>
					</tr>
        			<!--<tr>
                    	<td>Class</td>
						<td>
                        	<select name="class" id="class">
								<option <?php if($row['Class']=='recommended')echo 'selected'?>>Recommended</option>
                                <option <?php if($row['Class']=='featured')echo 'selected'?>>Featured</option>
								<option <?php if($row['Class']=='new')echo 'selected'?>>New</option>
							</select>
						</td>
					</tr>!-->
        			<tr>
						<td>&nbsp;</td>
						<td style="padding:0px;">
            		    	<input type="submit" value="Update" style="font-family:'Century Gothic', 'Times New Roman', Times, serif; font-size:12px; margin-left:5px; margin-bottom:2px; padding:7px;">
						</td>
    		    	</tr>
                    <?php
				}
				?>
				</table>
    		</form>

    	</section>
	</div>
</div>    
<br clear="all" />

<?php include('includes/footer.php') ?>

</body>
</html>