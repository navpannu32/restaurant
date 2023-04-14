<?php  
  require_once '../../database/connect.php';
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
  $role = "user";

  $pwdrepeat = filter_input(INPUT_POST, 'pwdrepeat', FILTER_SANITIZE_STRING);

  if (empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
    header('Location: ../../signup.php?error=emptyfields&name=' . $name . '&email=' . $email);
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../../signup.php?error=invalidemail&name=' . $name);
    exit();
  } else if ($pwd !== $pwdrepeat) {
    header('Location: ../../signup.php?error=passwordcheck&name=' . $name . '&email=' . $email);
    exit();
  } else {
    $sql = 'SELECT email FROM users WHERE email="'.$email.'";';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      header('Location: ../../signup.php?error=emailtaken&name=' . $name);
      exit();
    }
  }
  
  $pwd = password_hash($pwd, PASSWORD_DEFAULT);

  $sql = 'INSERT INTO users (name, email, password, role) VALUES ("'. $name .'", "'. $email .'", "'. $pwd .'", "'.$role.'");';
  echo $sql;
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  header('Location: ../../index.php');
?>
