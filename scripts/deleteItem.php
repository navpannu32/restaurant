<?php
  include '../database/connect.php';
  $id = $_GET['id'];
  $sql = 'DELETE FROM items WHERE id = :id;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);
  header('Location: ../index.php');
?>
