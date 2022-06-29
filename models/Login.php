<?php

class LoginModel extends UserModel
{

  public function __construct()
  {
    parent::__construct();
  }

  public function login($user, $password)
  {
    if ($this->exists($user)) {
      error_log("LOGINMODE::LOGIN user id" . $this->getIdUser());

      if ($this->verifyPassword($password, $this->getPassword())) {
        error_log('LOGINMODEL::login() verify password PASSED');
        return $this;
      } else {
        error_log("LOGINMODEL::LOGIN verify password fail");
        return NULL;
      }
    } else {
      error_log("LOGINMODEL::LOGIN no existe el usuario");
      return NULL;
    }
  }
}
