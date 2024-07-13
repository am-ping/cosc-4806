<?php

class Reminder {

  public function __construct() {

  }

  public function get_most_reminders_user () {
    $db = db_connect();
    $statement = $db->prepare("SELECT u.username, COUNT(r.id) AS reminder_count FROM users u JOIN reminders r ON u.id = r.user_id GROUP BY u.id, u.username ORDER BY reminder_count DESC LIMIT 1;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  
  public function get_all_reminders () {
    $db = db_connect();
    $statement = $db->prepare("SELECT reminders.user_id, users.username, reminders.subject, reminders.created_at FROM reminders INNER JOIN users ON reminders.user_id=users.id;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  
  public function total_logins () {
    $db = db_connect();
    $statement = $db->prepare("SELECT username, COUNT(*) AS total_logins FROM attempts_log WHERE attempt = 'good' GROUP BY username ORDER BY total_logins DESC;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_reminders () {
    $db = db_connect();
    $statement = $db->prepare("select * from reminders where user_id = :user_id;");
    $statement->bindParam(':user_id', $_SESSION["user_id"]);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function create_reminder ($subject) {
    $db = db_connect();
    $statement = $db->prepare("insert into reminders (user_id, subject) values (:user_id, :subject);");
    $statement->bindParam(':user_id', $_SESSION["user_id"]);
    $statement->bindParam(':subject', $subject);
    $statement->execute();

    header('Location: /reminders');
    die;
  }

  public function update_reminder ($id, $subject) {
    $db = db_connect();
    $statement = $db->prepare("update reminders set subject = :subject where id = :id;");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':subject', $subject);
    $statement->execute();
    header('Location: /reminders');
    die;
  }

  public function delete_reminder ($id) {
    $db = db_connect();
    $statement = $db->prepare("delete from reminders where id = :id;");
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: /reminders');
    die;
  }

}

?>