<?php
require_once 'controllers/errores.php';

class App
{

  private $contador;

  function __construct()
  {

    $this->contador = constant('contador');

    $url = isset($_GET['url']) ? $_GET['url'] : '';

    $url = trim($url);

    $url = explode('/', $url);

    if (empty($url[$this->contador])) {    // Por defecto se llama al controlador General

      require_once 'controllers/login.php';

      $controller = new Login();

      $controller->loadModel('login');

      $controller->render();

      return false;
    }

    $archivoController = 'controllers/' . $url[$this->contador] . '.php';

    error_log($archivoController);

    if (!file_exists($archivoController)) return new Errores(); //Verifica que el archivo exista

    require_once $archivoController; // Lo requiere

    $controller = new $url[$this->contador]();  // Instancia el controlador

    $controller->loadModel($url[$this->contador]); // Carga el modelo asociado al controlador

    if (!(isset($url[$this->contador + 1]) && !empty($url[$this->contador + 1]))) return $controller->render(); // Verifica que existe un metodo y que no este vacio 

    if (!(method_exists($controller, $url[$this->contador + 1]))) return new Errores(); // Verifica que existe el metodo en la clase 

    if (!(isset($url[$this->contador + 2]))) return $controller->{$url[$this->contador + 1]}(); // Verifica si hay algun parametro para el metodo del controlador

    $nparam = sizeof($url) - 2; // Se extraer el numero de parametro para el metodo 

    $params = []; // Arreglo de parametros

    for ($i = 0; $i < $nparam; $i++) {              // Itera el array 
      array_push($params, $url[$i + 2]);        // anterior los 
    }                                             // parametros 

    $controller->{$url[1]}($params);              // Por ultimo, pasa como un array al metodo correspondiente

  }
}
