<?php

  $dsn = 'mysql:host=localhost;dbname=restaurants';
  $username = 'root';
  $password = '';

  $pdo = null;

  try {
    $pdo = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    throw new Exception('Connection failed: ' . $e->getMessage());
  }
?>
