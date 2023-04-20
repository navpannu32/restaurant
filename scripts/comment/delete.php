<?php
  require_once '../../database/connect.php';

  session_start();

  if ($_SESSION['role'] != "admin" && $_SESSION['role'] != "user") {
    header("Location: ../");
    exit();
  }

  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

  $sql = 'DELETE FROM comments WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);

  header("Location: /admin/comments");
  exit();
?>
