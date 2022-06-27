<?php

class Productos extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $dataUser = $this->getUserSessionData();

    error_log("PRODUCTOS::RENDER dataUser " . $dataUser->getUser());

    $this->view->render('productos/index', ['dataUser' => $dataUser]);
  }
}
