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

  $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'restaurant'");
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result["SCHEMA_NAME"] != "restaurant") {
    $sql = file_get_contents("C:/xampp/htdocs/restaurant.sql");
    $pdo->exec($sql);
  }
?>
