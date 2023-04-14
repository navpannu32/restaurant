<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/auth/login.css">
  <title>Login</title>
</head>
<body>
<?php require_once '../header.php'; ?>
  <h1>
    Login
  </h1>
  <form action="../scripts/auth/login.php" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
