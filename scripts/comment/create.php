<?php
  include '../../database/connect.php';

  $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

  $item_id = htmlspecialchars($_POST['item_id'], ENT_QUOTES, 'UTF-8');
  $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');

  echo $comment;
  echo $item_id;
  echo $user_id;


  $sql = 'INSERT INTO comments (comment, item_id, user_id) VALUES ("'.$comment.'", '.$item_id.', '.$user_id.');';
  echo $sql;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  header('Location: ../../item/item?id='.$item_id);
  exit();
  
?>