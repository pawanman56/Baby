<?php

session_start();
if(!isset($_SESSION['login'])||($_SESSION['login']!='yes')) exit;

include('config/database.php');

$id = $_GET['id'];
$q = "SELECT * FROM `tbl_products` WHERE `ID` = '$id'";
$result = mysql_query($q);
$row = mysql_fetch_array($result);
//echo mysql_error();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Product - BabyCare CMS</title>

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
		<h1 style="margin:0px; padding:0px; padding-top:5px; padding-left:20px;">Update Product</h1>
    	<section>
    	
			<form method="post" action="product_edit_action.php" name="product_edit" id="product_edit" style="float:left; margin:0px 20px;">
            	<input type="hidden" name="id" value="<?php echo $id ?>">
				<table>
                <?php $id = $_GET['id'];
				$q = "SELECT * FROM `tbl_products` WHERE `ID` = '$id'";
				$result = mysql_query($q);
				$row = mysql_fetch_array($result);
				{
					?>
					<tr>
        		  		<td width="22%">Product Name</td>
        		  		<td width="78%"><input type="text" name="title" id="title" value="<?php echo $row['Name']?>"></td>
        			</tr>
        			<tr>
						<td>Description</td>
						<td><textarea name="desc" cols="50" rows="10" id="desc"></textarea></td>
					</tr>
		        	<tr>
						<td>Type</td>
						<td><select name="type" id="type">
								<option <?php if($row['Type']=='Boys')echo 'selected'?>>Boys</option>
								<option <?php if($row['Type']=='Girls')echo 'selected'?>>Girls</option>
							</select>
						</td>
					</tr>
        			<tr>
                    	<td>Class</td>
						<td>
                        	<input type="text" name="class" id="class" value="<?php echo $row['Class'] ?>" />
                        </td>
					</tr>
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