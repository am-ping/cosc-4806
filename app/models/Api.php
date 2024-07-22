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
  
}

?>