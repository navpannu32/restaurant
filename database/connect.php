<?php

  $dsn = 'mysql:host=localhost;dbname=restaurant';
  $username = 'root';
  $password = '';

  $pdo = null;

  try {
    $pdo = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    throw new Exception('connection failed: ' . $e->getMessage());
  }
?>
