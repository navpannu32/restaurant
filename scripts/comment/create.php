<?php
  include '../../database/connect.php';
  session_start();
  $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

  $item_id = htmlspecialchars($_POST['item_id'], ENT_QUOTES, 'UTF-8');
  $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');

  $sql = "";

  if($user_id) {
    $sql = 'INSERT INTO comments (comment, item_id, user_id) VALUES ("'.$comment.'", '.$item_id.', '.$user_id.');';
  } else {
    $sql = 'INSERT INTO comments (comment, item_id, user_id) VALUES ("'.$comment.'", '.$item_id.', null);';
  }


  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  header('Location: ../../item/item?id='.$item_id);
  exit();
  
?>