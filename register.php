<!DOCTYPE html>
<html class="general" lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Register</title>
  <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Register</h1><br>

    <form method="post" action="register_submit.php">
      <label>Player name</label><input type="text" name="username" required>

      <br>

      <label>Password:</label><input type="text" name="password" required>

      <br>
      <br>

      <button type="submit">Register</button>
    </form>

    <br>

    <form method="get" action="login.php">
      <button type="submit">Login page</button>
    </form>
  </div>
</body>
</html>
