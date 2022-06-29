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

  public function getCategories($arr = NULL)
  {
    $this->initialJson();
    $err = [];

    if (!$this->existsSession()) {
      $this->setCodeJson(501);
      $this->setOutputJson(["msg" => "Not authorized"]);
    } else if ($arr !== NULL) {
      $id = $arr[0];
      $this->setCodeJson(200);
      $this->setOutputJson(["msg" => "Respuesta para la funcion getCategories", "ID" => $id]);
    } else {
      $this->setCodeJson(500);
      array_push($err, "Hubo un error en el servidor");
      $this->setOutputJson(["error" => $err]);
    }

    $this->createJson();
  }
}
