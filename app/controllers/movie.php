<?php

class Movie extends Controller {

    public function index($movie, $api_response) {		
      $this->view('movie/index', ['movie' => $movie, 'api_response' => $api_response]);
      
    }

    public function search(){

      $movie_title = $_REQUEST['movie'];
      $api = $this->model('Api');
      $movie = $api->search_movie($movie_title);
      
      $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=".$_ENV["gemini_key"];

      $data = array(
        "contents" => array(
          array(
            "role" => "user",
            "parts" => array(
              array(
                "text" => "Write the numbers from 1-10"
              )
            )
          )
        )
      );

      $json_data = json_encode($data);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      curl_close($ch);
      
      if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
      }

      $api_response = json_decode($response, true);
      $this->index($movie, $api_response);
    }

    public function save_rating() {
      $rating = $_REQUEST['rating'];
      $reminder = $this->model('Reminder');
      $reminder->create_reminder($rating);
      if (isset($_POST['user_id'], $_POST['movie_title'], $_POST['rating'])) {
        $user_id = $_POST['user_id'];
        $movie_title = $_POST['movie_title'];
        $rating = $_POST['rating'];

        $api = $this->model('Api');
        $result = $api->save_rating($user_id, $movie_title, $rating);

        echo json_encode(['status' => 'success']);
  
      }
    }

}
