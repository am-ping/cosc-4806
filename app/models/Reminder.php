<?php

class Reminder {

  public function __construct() {

  }

  public function get_all_reminders () {
    $db = db_connect();
    $statement = $db->prepare("select * from reminders;");
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