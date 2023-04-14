<?php
  include '../../database/connect.php';
  echo "hi";
  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if (empty($email) || empty($pwd)) {
    header('Location: /auth/login.php?error=emptyfields');
    exit();
  } else {
    $sql = 'SELECT * FROM users WHERE email="'.$email.'";';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      if (password_verify($pwd, $result['password'])) {
        setcookie("id", $result['id'], time() + (86400 * 30), "/");
        setcookie("name", $result['name'], time() + (86400 * 30), "/");
        setcookie("email", $result['email'], time() + (86400 * 30), "/");
        setcookie("role", $result['role'], time() + (86400 * 30), "/");
        header('Location: /index.php');
        exit();
      } else {
        header('Location: /auth/login.php?error=wrongpassword');
        exit();
      }
    } else {
      header('Location: /auth/login.php?error=nouser');
      exit();
    }
  }
?>