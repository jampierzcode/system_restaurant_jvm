<?php

class View
{

  public function __construct()
  {
  }

  function render($nombre, $data = [])
  {

    $this->d = $data;

    is_array($data) && $this->handleMessage();

    error_log("Render: " . $nombre);

    require 'views/' . $nombre . '.php';
  }

  public function handleMessage()
  {

    if (isset($_GET['success']) && isset($_GET['error'])) {
      // no se muestra nada porque no puede haber un error y un success al mmismo tiempo
    } else if (isset($_GET['success'])) {

      $this->handleSuccess();
    } else if (isset($_GET['error'])) {

      $this->handleError();
    }
  }

  private function handleError()
  {
    if (isset($_GET['error'])) {
      $hash = $_GET['error'];
      $errors = new Errors();

      if ($errors->existsKey($hash)) {
        error_log("Error: " . $errors->get($hash));
        $this->d['error'] = $errors->get($hash);
      } else {
        $this->d['error'] = NULL;
      }
    }
  }

  public function handleSuccess()
  {
    if (isset($_GET['success'])) {
      $hash = $_GET['success'];
      $success = new Success();
      if ($success->existsKey($hash)) {
        error_log("Success: " . $success->get($hash));
        $this->d['success'] = $success->get($hash);
      } else {
        $this->d['success'] = NULL;
      }
    }
  }

  public function showMessages()
  {
    $this->showError();
    $this->showSuccess();
  }

  private function showError()
  {
    if (array_key_exists('error', $this->d)) {
      $error = $this->d['error'];
      if ($error != NULL) {
        echo '<div id="toast_error">' . $error . '</div>';
      }
    }
  }

  private function showSuccess()
  {
    if (array_key_exists('success', $this->d)) {
      $success = $this->d['success'];
      if ($success != NULL) {
        echo '<div id="toast_success">' . $success . '</div>';
      }
    }
  }
}
