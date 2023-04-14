<?php
  include '../../database/connect.php';

  $comment = $_POST['comment'];
  $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

  $item_id = htmlspecialchars($_GET['item_id'], ENT_QUOTES, 'UTF-8');
  $user_id = htmlspecialchars($_GET['user_id'], ENT_QUOTES, 'UTF-8');

  $sql = 'INSERT INTO comments (comment, item_id, user_id) VALUES ("'.$comment.'", '.$item_id.', '.$user_id.');';
  echo $sql;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  header('Location: ../../item/item.php?id='.$item_id);
  exit();
  
?>