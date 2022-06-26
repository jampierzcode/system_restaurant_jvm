<?php

class UserModel extends Model
{

  private $IdUser;
  private $IdDni;
  private $User;
  private $Rol;
  private $Nulo;
  private $Password;

  public function __construct()
  {

    parent::__construct();

    $this->IdUser = '';
    $this->IdDni = '';
    $this->User = '';
    $this->Rol = '';
    $this->Nulo = '';
    $this->Password = '';
  }

  public function get($IdUser)
  {
    try {
      $select = $this->prepare("SELECT u.IdUser IdUser, u.IdDni IdDni, u.User User, r.UserRol Rol, u.Nulo Nulo, u.Password Password FROM Usuario u INNER JOIN URol r ON u.Rol = r.Rol WHERE u.IdUser = :IdUser;");
      $select->bindValue(":IdUser", $IdUser, PDO::PARAM_INT);
      if ($select->execute()) {
        $data = $select->fetch(PDO::FETCH_ASSOC);

        $this->IdUser = $data['IdUser'];
        $this->IdDni = $data['IdDni'];
        $this->User = $data['User'];
        $this->Rol = $data['Rol'];
        $this->Nulo = $data['Nulo'];
        $this->Password = $data['Password'];

        return $this;
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function save()
  {
    try {
      $connect = $this->connect();
      $insert = $connect->prepare("INSERT INTO Usuario (IdDni, User, Rol, Nulo, Password) VALUES (:IdDni, :User, :Rol, :Nulo, :Password)");
      $insert->bindValue(":IdDni", $this->IdDni, PDO::PARAM_INT);
      $insert->bindValue(":User", $this->User, PDO::PARAM_STR);
      $insert->bindValue(":Rol", $this->Rol, PDO::PARAM_INT);
      $insert->bindValue(":Nulo", $this->Nulo, PDO::PARAM_INT);
      $insert->bindValue(":Password", $this->Password, PDO::PARAM_STR);
      if ($insert->execute()) {
        $id = $connect->lastInsertId();
        $this->get($id);
        return $this;
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return NULL;
    }
  }

  public function updateIdDni($dni, $IdUser)
  {
    try {
      $query = $this->connect();
      $select = $query->prepare('UPDATE Usuario SET IdDni = :dni WHERE IdUser = :IdUser');
      $select->bindValue(':dni', $dni, PDO::PARAM_INT);
      $select->bindBValue(':IdUser', $IdUser, PDO::PARAM_INT);
      if ($select->execute()) return $query->fetch();
    } catch (PDOException $e) {
      error_log($e->getMessage());
    }
  }

  public function exists($User)
  {
    try {
      $query = $this->prepare('SELECT IdUser FROM Usuario WHERE User = :User');
      $query->bindValue(':User', $User, PDO::PARAM_STR);
      $query->execute();

      if ($query->rowCount() === 1) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $this->get($result['IdUser']);
        return true;
      } else {
        error_log('USERMODE::EXISTS false');
        return false;
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
    }
  }

  public function delete($IdUser)
  {
    try {
      $delete = $this->prepare("DELETE FROM Usuario WHERE IdUser = :IdUser");
      $delete->bindValue(":IdUser", $IdUser, PDO::PARAM_INT);
      return $delete->execute();
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  // Function extras
  private function encrypt($password)
  {
    $key = hash('sha256', constant('SECRET_KEY'));
    $iv = substr(hash('sha256', constant('SECRET_IV')), 0, 16);
    return base64_encode(openssl_encrypt($password, constant('METHOD'), $key, 0, $iv));
  }

  private function decrypt($hash)
  {
    $key = hash('sha256', constant('SECRET_KEY'));
    $iv = substr(hash('sha256', constant('SECRET_IV')), 0, 16);
    return openssl_decrypt(base64_decode($hash), constant('METHOD'), $key, 0, $iv);
  }

  public function verifyPassword($current, $hash)
  {
    $password = $this->decrypt($hash);
    error_log("Password Actual -> $current , Password Descriptada -> $password");
    return $current === $password;
  }

  // Getter and Setters 

  public function getIdUser()
  {
    return $this->IdUser;
  }
  public function getIdDni()
  {
    return $this->IdDni;
  }
  public function getUser()
  {
    return $this->User;
  }
  public function getRol()
  {
    return $this->Rol;
  }
  public function getNulo()
  {
    return $this->Nulo;
  }
  public function getPassword()
  {
    return $this->Password;
  }

  public function setIdUser($IdUser)
  {
    $this->IdUser = $IdUser;
  }
  public function setIdDni($IdDni)
  {
    $this->IdDni = $IdDni;
  }
  public function setUser($User)
  {
    $this->User = $User;
  }
  public function setRol($Rol)
  {
    $this->Rol = $Rol;
  }
  public function setNulo($Nulo)
  {
    $this->Nulo = $Nulo;
  }
  public function setPassword($Password)
  {
    $this->Password = $this->encrypt($Password);
  }
}
