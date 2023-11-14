<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Login</title>
  <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Login</h1>

    <br>

    <form method="post" action="login_submit.php">
      <label>Username</label><input type="text" name="username" required>

      <br>
      <label>Password:</label><input type="text" name="password" required>
      
    <br>
    <br>

      <button type="submit" name="login">Login</button>
    </form>

    <br>

    <form method="get" action="register.php">
      <button type="submit">Sign up</button>
    </form>
</body>

</html>
