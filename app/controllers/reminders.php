<?php

class Reminders extends Controller {

  public function index() {
    $reminder = $this->model('Reminder');
    $list_of_reminders = $reminder->get_all_reminders();
    $this->view('reminders/index', ['reminders' => $list_of_reminders]);
  }

  public function create() {
    $subject = $_REQUEST['subject'];
    
    $reminder = $this->model('Reminder');
    $reminder->create_reminder($subject);
  }

  public function update() {
    $id = $_GET['id'];
    $reminder = $this->model('Reminder');
    $reminder->update_reminder($id, $subject);
  }

  public function delete() {
    $id = $_GET['id'];
    $reminder = $this->model('Reminder');
    $reminder->delete_reminder($id);
  }

}