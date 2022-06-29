<?php

class Register extends SessionController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('register/index');
  }

  public function save()
  {
    if ($this->existPOST(['user', 'password'])) {
      $username = $this->getPost('user');
      $password = $this->getPost('password');

      //validate data
      if ($username == '' || empty($username) || $password == '' || empty($password)) {
        //$this->errorAtLogin('Campos vacios');
        error_log('Login::authenticate() empty');
        $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
        return;
      }

      $this->model->setIdDni(71238977);
      $this->model->setUser($username);
      $this->model->setRol(3);
      $this->model->setNulo(1);
      $this->model->setPassword($password);

      $user = $this->model->save();

      if ($user != NULL) {
        // inicializa el proceso de las sesiones
        error_log('Login::save() ok');
        $this->redirect('register', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
      } else {
        //error al registrar, que intente de nuevo
        $this->redirect('register', ['error' => Errors::ERROR_SIGNUP_NEWUSER]);
      }
    } else {
      // error, cargar vista con errores
      //$this->errorAtLogin('Error al procesar solicitud');
      error_log('Login::authenticate() error with params');
      $this->redirect('register', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
    }
  }
}
