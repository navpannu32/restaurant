<?php
  include '../../database/connect.php';
  session_start();
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
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['role'] = $result['role'];
        
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