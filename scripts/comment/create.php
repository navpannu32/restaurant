<?php
  include '../../database/connect.php';

  $comment = $_POST['comment'];
  $item_id = $_POST['item_id'];
  $user_id = $_POST['user_id'];

  $sql = 'INSERT INTO comments (comment, item_id, user_id) VALUES ("'.$comment.'", '.$item_id.', '.$user_id.');';
  echo $sql;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  header('Location: /restaurants/item/item.php?id='.$item_id);
  exit();
  
?>