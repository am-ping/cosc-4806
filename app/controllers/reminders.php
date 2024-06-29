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
    $reminder = $this->model('Reminder');
    $this->view('reminders/update');
  }

  public function delete() {
    $reminder = $this->model('Reminder');
    $this->view('reminders/delete');
  }

}