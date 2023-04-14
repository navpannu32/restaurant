<?php
  require_once '../../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../index.php");
    exit();
  }

  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

  $sql = 'SELECT * FROM comments WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $comment = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$comment) {
    echo '<h1>Comment not found</h1>';
    exit();
  }

  $is_approved = $comment['is_approved'] ? 0 : 1;
  $sql = 'UPDATE comments SET is_approved = ? WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$is_approved, $id]);

  header("Location: ../../admin/comments.php");
  exit();
?>
