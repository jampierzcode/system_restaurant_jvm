<?php

class Logout extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->logout();

    $this->redirect('');
  }
}
