<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit user</title>
</head>
<body>
<?php
  require_once '../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../index.php");
    exit();
  }
  
  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

  $sql = 'SELECT * FROM users WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    echo '<h1>User not found</h1>';
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = 'UPDATE users SET email = ?, role = ? WHERE id = ?;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $role, $id]);
    header("Location: ./users.php");
    exit();
  }

  echo '<h1>Edit User</h1>';
  echo '<form method="post">';
  echo '<label for="email">Email:</label>';
  echo '<input type="email" id="email" name="email" value="'.$user['email'].'" required>';
  echo '<label for="role">Role:</label>';
  echo '<select id="role" name="role" required>';
  echo '<option value="user"'.($user['role'] == 'user' ? ' selected' : '').'>User</option>';
  echo '<option value="admin"'.($user['role'] == 'admin' ? ' selected' : '').'>Admin</option>';
  echo '</select>';
  echo '<input type="submit" value="Save">';
  echo '</form>';

  require_once '../footer.php';
?>

</body>
</html>