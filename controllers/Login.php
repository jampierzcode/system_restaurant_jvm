<?php

class Login extends SessionController
{

  function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('login/index');
  }

  public function authenticate()
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
      // si el login es exitoso regresa solo el ID del usuario

      $user = $this->model->login($username, $password);

      if ($user != NULL) {
        // inicializa el proceso de las sesiones
        error_log('Login::authenticate() passed');
        $this->initialize($user);
        // $this->redirect('', ['success' => Success::SUCCESS_USER_LOGIN]);
      } else {
        //error al registrar, que intente de nuevo
        //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
        error_log('Login::authenticate() username and/or password wrong');
        $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
        return;
      }
    } else {
      // error, cargar vista con errores
      //$this->errorAtLogin('Error al procesar solicitud');
      error_log('Login::authenticate() error with params');
      $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
    }
  }
}
