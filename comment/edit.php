<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit delete</title>
</head>
<body>
  <?php include_once "/header" ?>
  <?php
    require_once '../database/connect.php';
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8')  ?? 1;
    $sql = 'SELECT * FROM comments WHERE id = :id;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
  <main>
    <form action="../scripts/comment/edit" method="post">
      <label for="comment">Comment</label>
      <input type="text" name="comment" id="comment" value="<?php echo $comment['comment'] ?>">
      <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
      <input type="submit" value="Edit">
    </form>
    <form action="/scripts/comment/delete" method="post">
      <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
      <input type="submit" value="Delete">
    </form>
  </main>
</body>
</html>
