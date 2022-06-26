<?php

class Dashboard extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $dataUser = $this->getUserSessionData();

    error_log("DASHBOARD::RENDER dataUser " . $dataUser->getUser());

    $this->view->render('dashboard/index', ['dataUser' => $dataUser]);
  }
}
