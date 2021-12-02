<?php


class Film{
	public $id;
	public $title;
	public $year;
	public $duration;
	public $certId;

	function __construct($title, $year, $duration, $certId){
		$this->title=$title;
		$this->year=$year;
		$this->duration=$duration;
		$this->certId=$certId;
	}

	public function getAge(){
		$todaysDate   = new DateTime('today');
		$currentYear = $todaysDate->format("Y");
		return $currentYear-$this->year;
	}

	public function save(){
                $conn = DbConnect::getConnection();
                $query = "INSERT INTO films (id, title, year, duration, certificate_id) VALUES (NULL, :title, :year, :duration, :certId)";
	        $stmt = $conn->prepare($query);
	        $stmt->bindValue(':title', $this->title);
	        $stmt->bindValue(':year', $this->year);
	        $stmt->bindValue(':duration', $this->duration);
	        $stmt->bindValue(':certId', $this->certId);
	        $stmt->execute();
		$this->id = $conn->lastInsertId();
	}

	public static function find($id)
	{
		$conn = DbConnect::getConnection();
		$stmt = $conn->prepare("SELECT * FROM films WHERE films.id = :id");
		$stmt->bindValue(':id',$id);
		$stmt->execute();
		$row = $stmt->fetch();
		$filmObject = Film::makeFilmObject($row);
		return $filmObject;
	}

	private static function makeFilmObject($row)
	{
		$filmObject = new Film($row["title"], $row["year"], $row["duration"], $row["certificate_id"]);
		$filmObject->id=$row["id"];
		return $filmObject;
	}

}
