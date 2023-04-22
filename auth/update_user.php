<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='../styles/auth/update_user.css'>
  <title>Update user</title>
</head>
<body>
<?php require_once '../header.php'; ?>
  <div class="container">
    <form action="../scripts/auth/update_user.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <label for="new-password">New Password:</label>
      <input type="password" id="new-password" name="new_password">
      <input type="submit" value="Update">
    </form>
</div>
<?php require_once '../footer.php'; ?>
</body>
</html>