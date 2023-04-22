<?php
  session_start();
  include '../../database/connect.php';

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);

  if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $stmt = $pdo->prepare('SELECT password FROM users WHERE id = '.$user_id.';');
    echo 'SELECT password FROM users WHERE id = '.$user_id.';';
    $stmt->execute();
    $user = $stmt->fetch();


    if(password_verify($password, $user['password'])) {
      $stmt = $pdo->prepare('UPDATE users SET name = "'.$name.'" WHERE id = '.$user_id.';');
      $stmt->execute();

      if(!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('UPDATE users SET password = "'.$hashed_password.'" WHERE id = '.$user_id.';');
        $stmt->execute();
      }

      header('Location: /');
    } else {
      $_SESSION['error'] = 'Incorrect password';
      header('Location: /');
    }
  } else {
    header('Location: login.php');
  }
?>
