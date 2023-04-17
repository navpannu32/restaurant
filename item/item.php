<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/item/item.css">
  <title>Item Details</title>
</head>
<body>
  <?php require_once '../header.php'; ?>
  <?php
    require_once '../database/connect.php';
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8')  ?? 1;
    $sql = 'SELECT * FROM items WHERE id = ?;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$item) {
      echo '<h1>Item not found</h1>';
      exit();
    }
  ?>
  <div class="item">
    <h1><?php echo $item['name']; ?></h1>
    <?php if ($item['image']) { ?>
      <img src="../images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
    <?php } ?>
    <p><?php echo $item['description']; ?></p>
    <p>Category: <?php echo $item['category_name']; ?></p>
    <p>Price: <?php echo $item['price']; ?></p>
  </div>

  <div class="comments">
    <h2>Comments</h2>
    <form action="/scripts/comment/create" method="post">
          <label for="comment">Comment</label>
          <input type="text" name="comment" id="comment" required>
          <input type="hidden" name="item_id" value="<?php echo $id; ?>">
          <input type="hidden" name="user_id" value="<?php echo $_COOKIE['id']; ?>">
          <input type="submit" value="Create">
        </form>

    <?php
      $sql = 'SELECT * FROM comments WHERE item_id = ?;';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id]);
      $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if (count($comments) > 0): ?>
      <div class="comments-container">
        <?php foreach ($comments as $comment): ?>
          <?php if($comment["is_approved"]){ ?>
          <div class="comment">
            <p><?php echo $comment['comment']; ?></p>
            <p>By: <?php echo $comment['user_id']; ?></p>
          </div>
          <?php } ?>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>No comments found.</p>
    <?php endif; ?>
    
  </div>

  <?php require_once '.footer.php'; ?>
</body>
</html>
