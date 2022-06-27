<?php

class Dashboard extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $datauser = $this->getusersessiondata();

    error_log("dashboard::render datauser " . $datauser->getuser());

    $this->view->render('dashboard/index', ['datauser' => $datauser]);
  }
}
