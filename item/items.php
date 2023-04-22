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

  <?php
    require_once '../database/connect.php';

    $sort = 'id';
    $direction = 'ASC';

    if (isset($_GET['sort'])) {
      switch ($_GET['sort']) {
        case 'name':
          $sort = 'name';
          break;
        case 'created_at':
          $sort = 'created_at';
          break;
        case 'updated_at':
          $sort = 'updated_at';
          break;
      }
    }

    if (isset($_GET['direction']) && $_GET['direction'] === 'DESC') {
      $direction = 'DESC';
    }

    $page = 1;

    $offset = ($page - 1) * 9;

    $sql = 'SELECT * FROM items ORDER BY '.$sort.' '.$direction.' LIMIT 9 OFFSET '.$offset.';';

    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div class="sorting">
    <p>Sort by:</p>
    <a href="./items?sort=name&amp;direction=<?php echo ($sort === 'name' && $direction === 'ASC') ? 'DESC' : 'ASC'; ?>">Name</a>
    <a href="./items?sort=created_at&amp;direction=<?php echo ($sort === 'created_at' && $direction === 'ASC') ? 'DESC' : 'ASC'; ?>">Created At</a>
    <a href="./items?sort=updated_at&amp;direction=<?php echo ($sort === 'updated_at' && $direction === 'ASC') ? 'DESC' : 'ASC'; ?>">Updated At</a>
  </div>

  <div class="cards-container">
    <?php
      foreach ($items as $item) {
        echo '<div class="card">';
        echo '<img src="../images/'.$item['image'].'" alt="'.$item['name'].'">';
        echo '<h2>' . $item['name'] . '</h2>';
        echo '<p>' . $item['description'] . '</p>';
        echo '<p>Price: $' . $item['price'] . '</p>';
        echo '<a href="/item/item?id='.$item['id'].'">Details</a>';
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
        echo '<a href="./items?page='.$i.'&amp;sort='.$sort.'&amp;direction='.$direction.'">'.$i.'</a>';
      }
    ?>
  </div>

  <?php require_once '../footer.php'; ?>
</body>
</html>
