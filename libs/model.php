<?php

class Model
{

  private $pathFiles;

  function __construct()
  {

    $this->db = new Database();
    $this->pathFiles = [
      "image" => "./assets/img/",
      "icon" => "./assets/img/icons/",
    ];
  }

  public function query($query)
  {
    return $this->db->connect()->query($query);
  }

  public function prepare($query)
  {
    return $this->db->connect()->prepare($query);
  }

  public function connect()
  {
    return $this->db->connect();
  }
}
