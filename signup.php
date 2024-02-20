<?php
  include('includes/autoloader.inc.php');

  if(isset($_POST['register'])) {

    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $registerUser = new  AccountController();
    $registerUser->insertUserRequest($firstName, $lastName, $username, $password);
    unset($registerUser); // close the object after usage
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System - Sign Up</title>
</head>
<body>

  <main>
    <form action="#" method="POST">

      <h1>Sign up!</h1>
      <div class="firstname">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName">
      </div>
      <div class="firstname">
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName">
      </div>
      <div class="username">
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username">
      </div>
      <div class="password">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
      </div>
      <input type="submit" value="Register" name="register">
    </form>
    <div class="login">
      <a href="index.php">Login Instead</a>
    </div>
  </main>

</body>
</html>