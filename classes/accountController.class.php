<?php

class AccountController extends Accounts{
  function insertUserRequest($firstName, $lastName, $username, $password) {
    $reponse = $this->createUser($firstName, $lastName, $username, $password);

    if($reponse == true){
      header('location: index.php');
    }else{
      echo 'Something went wrong';
    }
  }

  function readUserRequest($username, $password) {
    $response = $this->readUser($username, $password);
    
    if($response == true){
      header('location: homepage.php');
    }else{
      echo 'Wrong password or username!';
    }
  }

}