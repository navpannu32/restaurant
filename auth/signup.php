<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>
<body>
<?php require_once '../header.php'; ?>

  <h1>
    Sign Up
  </h1>
  <form action="../scripts/auth/signup.php" method="post">
    <input type="text" name="name" placeholder="Full name..." required >
    <input type="email" name="email" placeholder="Email..." required >
    <input type="password" name="pwd" placeholder="Password..." required >
    <input type="password" name="pwdrepeat" placeholder="Repeat password..." required >
    <select name="role" id="role">
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
    <button type="submit" name="submit">Sign up</button>
  </form>
</body>
</html>
