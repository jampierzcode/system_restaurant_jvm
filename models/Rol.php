<?php

class RolModel extends Model
{
  private $Rol;
  private $UserRol;

  public function __construct()
  {
    parent::__construct();

    $this->Rol = '';
    $this->UserRol = '';
  }

  public function getAllRol()
  {
    try {
      $select = $this->prepare("SELECT * FROM URol");
      $select->execute();
      return $select->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function saveRol()
  {
    try {
      $connect = $this->connect();
      $insert = $connect->prepare("INSERT INTO URol (UserRol) VALUES (:UserRol)");
      $insert->bindValue(":UserRol", $this->UserRol, PDO::PARAM_STR);
      return $insert->execute();
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function deleteRol()
  {
    try {
      $delete = $this->prepare("DELETE FROM URol WHERE Rol = :Rol");
      $delete->bindValue(":Rol", $this->Rol, PDO::PARAM_INT);
      return $delete->execute();
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function updateRolById($Rol)
  {
    try {
      $update = $this->prepare("UPDATE URol SET UserRol = :UserRol WHERE Rol = :Rol");
      $update->bindValue(":UserRol", $this->UserRol, PDO::PARAM_STR);
      $update->bindValue(":Rol", $this->Rol, PDO::PARAM_INT);
      return $update->execute();
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function getRolById()
  {
    try {
      $select = $this->prepare("SELECT * FROM URol WHERE Rol = :Rol");
      $select->bindValue(":Rol", $this->Rol, PDO::PARAM_INT);
      if ($select->execute()) {
        return $select->fetch(PDO::FETCH_OBJ);
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
      return false;
    }
  }

  public function getRol()
  {
    return $this->Rol;
  }
  public function getUserRol()
  {
    return $this->UserRol;
  }

  public function setRol($Rol)
  {
    $this->Rol = $Rol;
  }

  public function setUserRol($UserRol)
  {
    $this->UserRol = $UserRol;
  }
}
