<?php 
	class Song {

		private $con;
		private $id;
		private $msqliData;
		private $title;
		private $artistId;
		private $albumId;
		private $genre;
		private $duration;
		private $path;

		public function __construct($con, $id){
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
			$this->msqliData = mysqli_fetch_array($query);
			$this->title = $this->msqliData['title'];
			$this->artistId = $this->msqliData['artist'];
			$this->albumId = $this->msqliData['album'];
			$this->genre = $this->msqliData['genre'];
			$this->duration = $this->msqliData['duration'];
			$this->path = $this->msqliData['path'];

		}

		public function getTitle(){
			return $this->title;
		}

		public function getId(){
			return $this->id;
		}

		public function getArtist(){
			return new Artist($this->con, $this->artistId);
		}

		public function getAlbum(){
			return new Album($this->con, $this->albumId);
		}

		public function getPath(){
			return $this->path;
		}

		public function getDuration(){
			return $this->duration;
		}

		public function getGenre(){
			return $this->genre;
		}

		public function getMysqliData(){
			return $this->mysqliData;
		}


		
	}



?>