<?php

class Reports extends Controller {

    public function index() {
      $reminder = $this->model('Reminder');
      $list_of_reminders = $reminder->get_all_reminders();
      $this->view('reports/index', ['reminders' => $list_of_reminders]);
    }

}
