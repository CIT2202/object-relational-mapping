<?php
class Film {
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

	function getAge(){
		$todaysDate   = new DateTime('today');
		$currentYear = $todaysDate->format("Y");
		return $currentYear-$this->year;
	}
}


?>
