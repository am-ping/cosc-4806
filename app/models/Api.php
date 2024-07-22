<?php

class Api {

  public function __construct() {
    
  }

  public function search_movie($movie_title) {
    $url = "http://www.omdbapi.com/?&apikey=" . $_ENV["omdb_key"] . "&t=" . str_replace(" ", "+", $movie_title);
    $json = file_get_contents($url);
    $phpObj = json_decode($json);
    $movie = (array) $phpObj;
    $title = $movie['Title'];
    return $movie;
  }

  public function save_rating($user_id, $movie_title, $rating) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO ratings (user_id, movie_title, rating) VALUES (:user_id, :movie_title, :rating)");
    $statement->bindValue(':user_id',  $_SESSION["user_id"]);
    $statement->bindValue(':movie_title',  $_SESSION["user_id"]);
    $statement->bindValue(':rating', $rating);
    $statement->execute();

    header('Location: /reminders');
    die;
  }
  
}

?>