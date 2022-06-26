<?php

class Admin extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('admin/index');
  }
}
