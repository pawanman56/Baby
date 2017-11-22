<div class="header">
	<div class="head_main">
		<div class="logo"><a href="index.php"><img src="images/logo2.png" height="90px" width="auto" /></a></div>
    	<div class="search">
        	<form method="post" action="search_result.php" name="search">
            <?php
				if(isset($_POST['searching']))
				{
					?>
					<input name="searching" class="enter" type="text" alt="Search" placeholder="<?php echo $search?>"/>
					<?php
				}
				else
                {
					?>
					<input name="searching" class="enter" type="text" alt="Search" placeholder="search recipe"/>
					<?php
				}
				?>
                <input type="submit" style="margin:0px; border-radius:7px; -moz-border-radius:7px; -webkit-border-radius:7px; border-style:dotted;" value="Go" />
			</form>
        </div>
	</div>
</div>