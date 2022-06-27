<?php

class Vender extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render(): void
  {
    $dataUser = $this->getUserSessionData();

    error_log("VENDER::RENDER dataUser " . $dataUser->getUser());

    $this->view->render('vender/index', ['dataUser' => $dataUser]);
  }
}
