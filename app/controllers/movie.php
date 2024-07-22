<?php

class Movie extends Controller {

    public function index($movie = null) {		
      $this->view('movie/index', ['movie' => $movie]);
    }

    public function search(){
      if (!isset($_REQUEST['movie'])) {
        // redirect to movie
      }

      $movie_title = $_REQUEST['movie'];
      $api = $this->model('Api');
      $movie = $api->search_movie($movie_title);

      $this->index($movie);

    }

}
