<?php

class Controller
{

  public function __construct()
  {
    $this->view = new View();
  }

  public function loadModel($model)
  {
    $url = 'models/' . $model . '.php';

    if (file_exists($url)) {
      require_once $url;
      $model = $model . 'Model';
      $this->model = new $model();
    }
  }

  public function existPost($params)
  {
    foreach ($params as $param) {
      if (!isset($_POST[$param])) {
        error_log("ExistPost: " . $param . " no existe");
        return false;
      }
    }
    error_log("ExistPost: Todos los parametros existen");
    return true;
  }

  // Valida la existencia de un archivo 
  public function existFile($params)
  {
    foreach ($params as $param) {
      if (!isset($_FILES[$param])) {
        error_log("ExistFile: " . $param . " no existe");
        return false;
      }
    }
    error_log("ExistFile: Todos los parametros existen");
    return true;
  }

  // Valida datos por GET 

  public function existGet($params)
  {
    foreach ($params as $param) {
      if (!isset($_GET[$param])) {
        error_log("ExistGet: " . $param . " no existe");
        return false;
      }
    }
    error_log("ExistGet: Todos los parametros existen");
    return true;
  }

  // Setter gettes GET, POST, FILE 

  public function getFile($name)
  {
    if (isset($_FILES[$name])) {
      return $_FILES[$name];
    }
    return null;
  }

  public function getGet($name)
  {
    if (isset($_GET[$name])) {
      return $_GET[$name];
    }
    return null;
  }

  public function getPost($name)
  {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }
    return null;
  }

  public function existJson($params)
  {
    foreach ($params as $param) {
      if (!isset($_GET[$param])) {
        error_log("ExistJson: " . $param . " no existe");
        return false;
      }
    }
    error_log("ExistJson: Todos los parametros existen");
    return true;
  }

  public function getValueJson($name)
  {
    return $this->inputJson[$name];
  }

  function initialJson()
  {

    header("Content-Type: application/json");
    header('Access-Control-Allow-Origin: ' . constant('URLCORS')); //Cambiar por el dominio 
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    $this->inputJson = json_decode(file_get_contents('php://input'), true);
  }

  //Salida de Json, parse del json 

  function createJson()
  {
    http_response_code($this->codeJson);
    echo json_encode($this->outputJson);
  }

  //Set valores json 

  function setCodeJson($code)
  {
    $this->codeJson = $code;
  }
  function setOutputJson($output)
  {
    $this->outputJson = $output;
  }
  public function redirect($url, $mensajes = [])
  {
    error_log("controller::redirect passed");
    $data = [];
    $params = '';

    foreach ($mensajes as $key => $value) {
      array_push($data, $key . '=' . $value);
    }
    $params = join('&', $data);

    if ($params != '') {
      $params = '?' . $params;
    }

    header('location: ' . constant('URL') . $url . $params);
  }
}
