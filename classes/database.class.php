<?php

class Database {
  private $host = 'localhost';
  private $dbName = 'library';
  private $username = 'root';
  private $password = 'Ramel_PHPServer!';
  
  function connect(){
    try {

      $pdo = new PDO('mysql:host='. $this->host .';dbname='. $this->dbName, $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    } catch (PDOException $e) {
      echo 'Error: ' .  $e->getMessage();
    }
  }

}
