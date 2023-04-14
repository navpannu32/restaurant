<?php
  require_once '../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../index.php");
    exit();
  }

  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

  $sql = 'DELETE FROM comments WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);

  header("Location: ./comments.php");
  exit();
?>
