<?php
require_once("../dbconnect.php");
require_once("Film.php");


//get one film
$film=Film::find(10);
echo "<p>".$film->title." is ".$film->getAge()." years old</p>";

$film = new Film("Arrival", "2016", 116, 3);
$film->save();

//get all the films
$films = Film::getAllFilms();
foreach($films as $film){
 	echo "<p>".$film->title." is ".$film->getAge()." years old</p>";
}

//delete a film
$film = Film::find(10);
$film->delete();
