<?php 
  include('includes/autoloader.inc.php');

  if(isset($_POST['login'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $login = new AccountController();
    $login->readUserRequest($username, $password);
    unset($login);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System - Login</title>
</head>
<body>

  <main>

    <form action="#" method="POST">
      <h1>Welcome! Please log in.</h1>
      <div class="username">
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username">
      </div>
      <div class="password">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
      </div>
      <input type="submit" value="Login" name="login">
      <div class="register">
        <h3>Don't have an account?</h3>
        <a href="signup.php">Sign up</a>
      </div>
    </form>

  </main>

  <footer>

  </footer>
</body>
</html>