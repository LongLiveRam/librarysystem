<?php

class Accounts extends Database{

  // create
  function createUser($firstName, $lastName, $username, $password) {
    $stmt = $this->connect()->prepare("INSERT INTO employees (first_name, last_name, user_name, password) VALUES (?,?,?,?)");
    
    if($stmt->execute(array($firstName, $lastName, $username, $password))) {
      return true;
    }else{
      return false;
    }
  }
  // read
  function readUser($username, $password) {
    $stmt = $this->connect()->prepare("SELECT * FROM employees WHERE user_name = ? AND password = ?");
    $stmt->execute(array($username, $password));

    if($stmt->rowCount() == 0) {
      return false;
    }else{
      return true;
    }
  }

  // update

  // delete/archive
}