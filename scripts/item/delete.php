<?php
  session_start();
  require_once '../../database/connect.php';
  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
  $sql = 'SELECT image FROM items WHERE id = :id;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);
  $image = $stmt->fetch(PDO::FETCH_ASSOC);

  if($image['image']) {
    unlink('../../images/' . $image['image']);
  }

  $sql = 'DELETE FROM items WHERE id = :id;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);


  header('Location: ../../');  
?>
