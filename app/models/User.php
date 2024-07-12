<?php

class User {

  public $username;
  public $password;
  public $auth = false;

  public function __construct() {
    
  }

  public function test () {
    $db = db_connect();
    $statement = $db->prepare("select * from users;");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function authenticate($username, $password) {
    /*
     * if username and password good then
     * $this->auth = true;
     */
    $username = strtolower($username);
    $db = db_connect();
    $statement = $db->prepare("select * from users WHERE username = :name;");
    $statement->bindValue(':name', $username);
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);

    if (!isset($_SESSION["failed_login"])) {
      $_SESSION["failed_login"] = 1;
    } else {
      $_SESSION["failed_login"] += 1;
    }
  
    if (password_verify($password, $rows['password'])) {
      $this->log_attempt($username, 'good');
      $_SESSION['auth'] = 1;
      $_SESSION['username'] = ucwords($username);
      $_SESSION['user_id'] = $rows['id'];
      if ($_SESSION['username'] == 'Admin') {
        $_SESSION['is_admin'] = true;
      }
      unset($_SESSION['failedAuth']);
      header('Location: /home');
      die;
    } else {
      $this->log_attempt($username, 'bad');
      if(isset($_SESSION['failedAuth'])) {
        $_SESSION['failedAuth']++;
      } else {
        $_SESSION['failedAuth'] = 1;
      }
      header('Location: /login');
      die;
    }
  }

  public function create_user($username, $password) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $statement->bindValue(':username', strtolower($username));
    $statement->bindValue(':password', $hashedPassword);
    $statement->execute();
    header('Location: /login');
    die;
  }

  public function validate($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username;");
    $statement->bindValue(':username', strtolower($username));
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function log_attempt($username, $attempt) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO attempts_log (username, attempt, time) VALUES (:username, :attempt, :time);");
    $statement->bindValue(':username', $username);
    $statement->bindValue(':attempt', $attempt);
    date_default_timezone_set('Canada/Eastern');
    $time = date('m/d/Y h:i:s a', time());
    $statement->bindValue(':time', $time);
    $statement->execute();
  }
}