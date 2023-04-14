<?php
  setcookie("id", "", time() - 3600, "/");
  setcookie("name", "", time() - 3600, "/");
  setcookie("email", "", time() - 3600, "/");
  setcookie("role", "", time() - 3600, "/");
  header('Location: /index.php');
  exit();
?>