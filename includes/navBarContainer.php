<div id="navBarContainer">
	<nav class="navBar">
		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo" >
			<img src="assets/images/serveimage.png">
		</span>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">
						Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>
		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your music</span>
			</div>
			<div class="navItem">
				<span id="navUserItem" role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink">
					<img id="userIcon" src="assets/images/user.png">
					<?php echo $userLoggedIn->getUsername(); ?></span>
			</div>
		</div>


		<div class="group">
			<div class="recentlyPlayed">
				Recently played
				<div class="recent"></div>
			</div>
		</div>
	</nav>
</div>