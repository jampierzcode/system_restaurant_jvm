<?php

class SessionController extends Controller
{

  private $userSession;
  private $username; // en la base de datos esta con user
  private $userid;

  private $session;
  private $sites;

  private $user;

  function __construct()
  {
    parent::__construct();

    $this->init();
  }

  public function getUserSession()
  {
    return $this->userSession;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getUserId()
  {
    return $this->userid;
  }

  private function init()
  {

    $this->session = new Session();

    $json = $this->getJsonFileConfig();
    $this->sites = $json['sites'];
    $this->defaultSites = $json['default-sites'];
    $this->validateSession();
  }


  private function getJsonFileConfig()
  {
    $string = file_get_contents('config/access.json');
    $json = json_decode($string, true);

    return $json;
  }

  /**
   * Implementa el flujo de autorización
   * para entrar a las páginas
   */

  function validateSession()
  {

    error_log('SessionController::validateSession()');

    if ($this->existsSession()) {

      $role = $this->getUserSessionData()->getRol();
      error_log("SessionController::validateSession() is true " . $this->user->getUser());
      error_log("SessionController::validateSession() is true " . $role);

      if ($this->isPublic()) {
        error_log("sessionController:validateSession() => sitio publico, redirige al main");
        $this->redirectDefaultSiteByRole($role);
      } else {
        if ($this->isAuthorized($role)) {
          error_log("SessionController::validateSession() => autorizado, lo dejamos pasar");
        } else {
          error_log("SessionController::validateSession() => no autorizado, redirige al main");
          $this->redirectDefaultSiteByRole($role);
        }
      }
    } else {
      if ($this->isPublic()) {
        error_log("SessionCOntrollerÑÑvalidateSession() public page");
      } else {
        error_log("SessionControler::validateSession() redirect al login");
        header('location: ' . constant('URL') . '');
        // return new Errores();
      }
    }
  }

  /**
   * Valida si existe sesión, 
   * si es verdadero regresa el usuario actual
   */

  function existsSession()
  {

    if (!$this->session->exists()) return false;

    if ($this->session->getCurrentUser() == NULL) return false;

    $userid = $this->session->getCurrentUser();

    error_log("Identificacion del usuario actual -> $userid");

    if ($userid) return true;

    return false;
  }

  function getUserSessionData()
  {

    error_log("SessionController::getUserSessionData() is started");

    $id = $this->session->getCurrentUser();

    $this->user = new UserModel();

    $userData = $this->user->get($id);

    // error_log($this->user->id);

    return $this->user = $userData;
  }

  public function initialize($user) // el user corresponde al objecto de las clase usermodel
  {

    error_log("sessionController::initialize(): user: " . $user->getUser());

    $this->session->setCurrentUser($user->getIdUser());
    $this->authorizeAccess($user->getRol());
  }

  private function isPublic()
  {
    $currentURL = $this->getCurrentPage();
    error_log("sessionController::isPublic(): currentURL => " . $currentURL);
    $currentURL = preg_replace("/\?.*/", "", $currentURL); // omite el get
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public') {
        return true;
      }
    }
    return false;
  }

  private function redirectDefaultSiteByRole($role)
  {
    $url = '';
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($this->sites[$i]['role'] === $role) {
        $url = $this->sites[$i]['site'];
        break;
      }
    }
    header('location: ' . $url);
  }

  private function isAuthorized($role)
  {
    $currentURL = $this->getCurrentPage();
    $currentURL = preg_replace("/\?.*/", "", $currentURL);
    for ($i = 0; $i < sizeof($this->sites); $i++) {
      if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role) {
        return true;
      }
    }
    return false;
  }

  private function getCurrentPage()
  {

    $actual_link = trim("$_SERVER[REQUEST_URI]");
    $url = explode('/', $actual_link);
    error_log("sessionController::getCurrentPage(): actualLink => " . $actual_link . ", url => " . $url[1]);

    return $url[1];
  }

  public function authorizeAccess($role)
  {
    error_log("sessionController::authorizeAccess(): role: $role");
    switch ($role) {
      case 'user':
        $this->redirect($this->defaultSites['user']);
        break;
      case 'admin':
        $this->redirect($this->defaultSites['admin']);
        break;
      default;
    }
  }

  function logout()
  {
    $this->session->closeSession();
  }
}
