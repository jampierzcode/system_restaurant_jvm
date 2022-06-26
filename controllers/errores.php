<?php

class Errores extends Controller
{

  private $codigo;
  private $mensaje;

  public function __construct($codigo = 404, $mensaje = 'Lo sentimos no hemos encontrado su pagina')
  {
    parent::__construct();

    $this->codigo = $codigo;
    $this->mensaje = $mensaje;

    if ($this->codigo === 404) $this->view->render('errors/404', $this->mensaje);

    if ($this->codigo === 500) $this->view->render('errors/500', $this->mensaje);
  }

  public function render()
  {
    // $this->view->render('errors/404', $this->mensaje);
  }
}
