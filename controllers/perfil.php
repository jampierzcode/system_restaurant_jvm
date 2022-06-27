<?php

class Perfil extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render(): void
  {
    $datauser = $this->getusersessiondata();

    error_log("PERFIL::render datauser " . $datauser->getuser());

    $this->view->render('perfil/index', ['datauser' => $datauser]);
  }
}
