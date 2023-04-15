<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/admin/user/users.css">
  <title>Users</title>
</head>
<body>
<?php
  include '../header.php';
  require_once '../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../");
    exit();
  }

  $sql = 'SELECT * FROM users;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo '<h1>Users</h1>';
  echo '<table>';
  echo '<tr><th>ID</th><th>Email</th><th>Role</th><th>Actions</th></tr>';
  foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['role'] . '</td>';
    echo '<td><a href="./edit_user?id='.$user['id'].'">Edit</a> | <a href="../scripts/user/delete?id='.$user['id'].'">Delete</a></td>';
    echo '</tr>';
  }
  echo '</table>';

  require_once '.footer.php';
?>

</body>
</html>