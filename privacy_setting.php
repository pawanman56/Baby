
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Privacy Setting - BabyCare.com</title>
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
    	<img src="images/footer/privacy_setting.png">
  	</div>
	<div class="contents">
    	<div class="news_feed1">
			<form name="Privacy Setting" style="padding:10px; text-align:justify;">
				<font face="Century Gothic, Georgia, Times New Roman, Times, serif">
				<table border="0" align="center" bgcolor="#FFFFFF" height="auto" width="auto">
			    	<tr>
			        	<th>First Name</th>
        			    <td><input type="text" name="fname"></td>
     			   </tr>
     			   <tr>
   				     	<th>Last Name</th>
			            <td><input type="text" name="lname"></td>
			        </tr>
			        <tr>
		        	<th>Address</th>
       			     <td><input type="text" name="adrs"></td>
			        </tr>
	                <tr>
			        	<th>Purchase Record</th>
			            <td><input type="checkbox" name="yes" />Yes<input type="checkbox" name="no">No</td>
			        </tr>
			     	<tr>
			        	<th>Privacy for</th>
			            <td><select size="1" name="day">
		    		        	<option value="Last Hour">Last Hour</option>
				                <option value="12 Hours">12 Hours</option>
				                <option value="24 Hours">24 Hours</option>
				                <option value="Yesterday">Yesterday</option>
				                <option value="1 month">1 month</option>
		    		            <option value="Year">Year</option>
			            	</select>
			            </td>
			        </tr>
                    <tr>
			            <td>&nbsp;</td>
			        </tr>
                    <tr>
			            <td>&nbsp;</td>
			        </tr>
                    <tr>
			            <td>&nbsp;</td>
			        </tr>
			        <tr>
			        	<th>Report Issues</th>
			            <td><textarea rows="5" cols="20" name="report"></textarea></td>
			        </tr>
                    <tr>
			        	<th>E-mail Id</th>
			            <td><input type="text" name="email"></td>
			        </tr>
				</table>
                <br />
                <br />
            	<center>
				<input type="submit" value="Submit">
	        	<input type="reset" value="Reset">
	    		</center>
	    		</font>
			</form>
			</div>
		</div>
        <br clear="all" />
	</div>
</div>
<?php
	include("php_include/footer.php");
?>

</body>
</html>
