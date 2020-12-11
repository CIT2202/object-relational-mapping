<?php
require_once("../dbconnect.php");
require_once("Film.php");
require_once("FilmMapper.php");

//get one film
$filmMapper = new FilmMapper();
$film = $filmMapper->find(5);
echo "<p>".$film->title." is ".$film->getAge()." years old</p>";


//save a film
$film = new Film("Test", "2020", 110,2);
$filmMapper->save($film); //inserts a row into a database

//get all the films
$films = $filmMapper->getAllFilms();
foreach($films as $film){
	echo "<p>".$film->title." is ".$film->getAge()." years old</p>";
}

//delete a film
$film = $filmMapper->find(21);
$filmMapper->delete($film);
