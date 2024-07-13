<?php

class Reports extends Controller {

    public function index() {
      $reminder = $this->model('Reminder');
      $all_reminders = $reminder->get_all_reminders();
      $most_reminders_user = $reminder->get_most_reminders_user();
      $total_logins = $reminder->total_logins();

      $this->view('reports/index', [
          'reminders' => $all_reminders,
          'most_reminders_user' => $most_reminders_user,
          'total_logins' => $total_logins
      ]);
    }

}
