<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/item/item.css" >
  <title>Item</title>
</head>
<body>
  <?php require_once '../header.php'; ?>
  <div class="item-container">
    <h1>Item</h1>
    <?php
      require_once '../database/connect.php';
      $id = $_GET['id'];
      $sql = 'SELECT * FROM items WHERE id = :id;';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $id]);
      $item = $stmt->fetch(PDO::FETCH_ASSOC);
      echo '<h2>' . $item['name'] . '</h2>';
      if($item['image']){
        echo '<img src="../images/' . $item['image'] . '" alt="' . $item['name'] . '">';
      }
      echo '<p>' . $item['description'] . '</p>';
      echo '<p>' . $item['price'] . '</p>';
      ?>
      <div class="comment-section">
        <form action="/restaurants/scripts/comment/create.php" method="post">
          <label for="comment">Comment</label>
          <input type="text" name="comment" id="comment" required>
          <input type="hidden" name="item_id" value="<?php echo $id; ?>">
          <input type="hidden" name="user_id" value="<?php echo $_COOKIE['id']; ?>">
          <input type="submit" value="Create">
        </form>
        <?php
          $sql = 'SELECT * FROM comments WHERE item_id = :id;';
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['id' => $id]);
          $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($comments as $comment) {
            echo '<p>' . $comment['comment'] . '</p>';
          }
        ?>
    </div>
  </div>
</body>
</html>
