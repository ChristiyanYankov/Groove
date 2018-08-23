<?php
include("includes/includedFiles.php");
if (isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else{
	$term = "";
}
?>

<div class="searchContainer">
	<!-- <h4>Search for and artist, album or song</h4> -->
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Search for any artist, album or song...">
</div>

<script type="text/javascript">
	var searchInput = $(".searchInput");
	searchInput.focus();
	var inputVal = searchInput.val();
	searchInput.attr("value", " ");
	searchInput.attr("value", inputVal);

	$(function(){
		searchInput.keyup(function(){
			//maha timer-a vseki put kogato nqkoi pishe
			clearTimeout(timer);

			timer = setTimeout(function(){
				var val = searchInput.val();
				openPage("search.php?term=" + val);
			}, 500);
		})
	})
</script>

<?php
	if ($term == "") {
		exit();
	}
?>


<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		<?php 

			$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");
			if (mysqli_num_rows($songsQuery) == 0) {
				echo "<span class='noResults'>No songs matching: " . $term . "</span>";
			}
			$songIdArray = array();
			$i = 1;
			while ($row = mysqli_fetch_array($songsQuery)) {

				if ($i>10) {
					break;
				}

				array_push($songIdArray, $row['id']);

				$albumSong = new Song($con, $row['id']);
				$albumArtist = $albumSong->getArtist();

				echo "<li class='tracklistRow'>
						<div class='trackCount'>
							<img class='play' src='assets/images/icons/play-white.png' 
							onclick='setTrack(\"".$albumSong->getId()."\", tmpPlaylist, true)'>
							<span class='trackNumber'>$i</span>
						</div>


						<div class='trackInfo'>
							<span class='trackName'>" . $albumSong->getTitle() . "</span>
							<span class='artistName'>" . $albumArtist->getName() . "</span>
						</div>

						<div class='trackOptions'>
							<input type='hidden' class='songId' value='". $albumSong->getId() ."'>
							<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>

						<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span> 

						</div>
					</li>";
				$i++;
			}
		?>

		<script type="text/javascript">
			var tmpSongIds = '<?php echo json_encode($songIdArray);?>';
			tmpPlaylist = JSON.parse(tmpSongIds);
			//console.log(tmpPlaylist);

		</script>
	</ul>

</div>


<div class="artistContainer borderBottom">
	
<h2>ARTISTS</h2>
	<?php
	$artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '%$term%' LIMIT 10");
	if (mysqli_num_rows($artistsQuery) == 0) {
				echo "<span class='noResults'>No artists matching: " . $term . "</span>";
	}

	while ($row = mysqli_fetch_array($artistsQuery)) {
		$artistFound = new Artist($con, $row['id']);

		echo "<div class='searchResultRow '>
				<div class='artistName'>
					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" .$artistFound->getId() . "\")'>
					"
					. $artistFound->getName() .
					"
					</span>

				</div>
			 </div>";
	}

	?>
</div>

<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '%$term%' LIMIT 10");
		if (mysqli_num_rows($albumQuery) == 0) {
				echo "<span class='noResults'>No albums matching: " . $term . "</span>";
		}

		while ($row = mysqli_fetch_array($albumQuery)) {

			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=". $row['id'] . "\")'>
						<img src='" . $row['artworkPath'] . "'>

							<div class='gridViewInfo'>"
							. $row['title'] .
							"</div>
					</span>		
				</div>";
		}

	?>
	
</div>


<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>














