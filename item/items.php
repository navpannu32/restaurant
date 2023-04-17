<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/item/items.css">
  <title>Menu</title>
</head>
<body>
  <?php require_once '../header.php'; ?>
  <h1>Menu</h1>
  <div class="cards-container">
    <?php
      require_once '../database/connect.php';
      if(isset($_GET['page']) && $_GET['page'] >= 1) {
        $page = htmlspecialchars($_GET['page'], ENT_QUOTES, 'UTF-8')  ?? 1;
      } else {
        $page = 1;
      }
      $offset = ($page - 1) * 9;
      $sql = 'SELECT * FROM items LIMIT 9 OFFSET '.$offset.';';
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($items as $item) {
        echo '<div class="card">';
        echo '<img src="../images/'.$item['image'].'" alt="'.$item['name'].'">';
        echo '<h2>' . $item['name'] . '</h2>';
        echo '<p>' . $item['description'] . '</p>';
        echo '<p>Price: $' . $item['price'] . '</p>';
        echo '<a href="./item/item?id='.$item['id'].'">Details</a>';
        echo '</div>';
      }
    ?>
  </div>

  <div class="pagination">
    <?php
      $sql = 'SELECT COUNT(*) FROM items;';
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetchColumn();
      $pages = ceil($count / 9);
      for ($i = 1; $i <= $pages; $i++) {
        echo '<a href="./items?page='.$i.'">'.$i.'</a>';
      }
    ?>
  </div>

  <?php require_once '../footer.php'; ?>
</body>
</html>
