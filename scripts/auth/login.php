<?php
  include '../../database/connect.php';
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $pwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  if (empty($email) || empty($pwd)) {
    header('Location: /auth/login?error=emptyfields');
    exit();
  } else {
    $sql = 'SELECT * FROM users WHERE email="'.$email.'";';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      if (password_verify($pwd.'m3tHfWC/ucLrIQlzL6P1ew==', $result['password'])) {
        setcookie("id", $result['id'], time() + (86400 * 30), "/");
        setcookie("name", $result['name'], time() + (86400 * 30), "/");
        setcookie("email", $result['email'], time() + (86400 * 30), "/");
        setcookie("role", $result['role'], time() + (86400 * 30), "/");
        header('Location: /');
        exit();
      } else {
        header('Location: ../../auth/login?error=wrongpassword');
        exit();
      }
    } else {
      header('Location: ../../auth/login?error=nouser');
      exit();
    }
  }
?>