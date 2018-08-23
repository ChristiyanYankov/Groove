<?php
include("includes/includedFiles.php");
?>

<div class="entityInfo">
	<div class="centerSection">
		<div class="userInfo">
			<h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>	
		</div>
	</div>

	<div class= "gridViewItem" style="
	display: block; 
	margin: 0 auto 20px auto; 
	max-width: 300px;
	min-width: 250px;">
		<img src="assets/images/profilepic.jpg">
	</div>

	<div class="buttonItems">
		<button class="button green" onclick="openPage('updateDetails.php')">USER DETAILS</button>
		<button class="button" onclick="logout()">LOG OUT</button>
	</div>
</div>