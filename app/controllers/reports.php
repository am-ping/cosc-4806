<?php

class Reports extends Controller {

    public function index() {
      $user = $this->model('User');

      $this->view('reports/index');
    }

}
