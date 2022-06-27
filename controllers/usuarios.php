<?php

class Usuarios extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $dataUser = $this->getUserSessionData();

    error_log("USUARIOS::RENDER dataUser " . $dataUser->getUser());

    $this->view->render('usuarios/index', ['dataUser' => $dataUser]);
  }
}
