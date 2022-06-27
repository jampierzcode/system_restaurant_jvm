<?php

class Api extends SessionController
{

  public function __construct()
  {
    parent::__construct();
    $this->initialJson();
  }

  public function render()
  {
    $this->view->render('api/index');
  }
}
