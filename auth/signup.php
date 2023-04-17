<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/auth/signup.css">
  <title>Sign Up</title>
</head>
<body>
<?php require_once '../header.php'; ?>
<div class="signup">
  
    <h1>
      Sign Up
    </h1>
    <form action="../scripts/auth/signup" method="post" class="signup">
      <input type="text" name="name" placeholder="Full name..." required >
      <input type="email" name="email" placeholder="Email..." required >
      <input type="password" name="pwd" placeholder="Password..." required >
      <input type="password" name="pwdrepeat" placeholder="Repeat password..." required >
      <button type="submit" name="submit">Sign up</button>
    </form>
</div>

  <?php require_once '../footer.php'; ?>
</body>
</html>
