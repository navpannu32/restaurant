<?php
  require_once './database/connect.php';

  $query = htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES, 'UTF-8');
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $limit = 9;
  $offset = ($page - 1) * $limit;

  
  $searchTerm = '';
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $searchTerm = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');
    $category = htmlspecialchars($_GET['category'] ?? '', ENT_QUOTES, 'UTF-8');
    
    $sql = "SELECT * FROM items";
    
    $params = array();
    if (!empty($query)) {
      $sql .= ' WHERE name LIKE ?';
      $params[] = '%' . $query . '%';
    }
    if (!empty($category)) {
      if (empty($query)) {
        $sql .= ' WHERE';
      } else {
        $sql .= ' AND';
      }
      $sql .= ' category_id = ?';
      $params[] = $category;
    }
    $sql .= ' ORDER BY name ASC;';
    
    $countSql = "SELECT COUNT(*) FROM items WHERE name LIKE '%$searchTerm%';";
  } else {
    header("Location: ./");
    exit();
  }
  
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $donuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $countStmt = $pdo->prepare($countSql);
  $countStmt->execute();
  $totalResults = $countStmt->fetchColumn();
  $totalPages = ceil($totalResults / $limit);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/search.css">
  <title>Search Results</title>
</head>
<body>
  <?php include_once "./header.php" ?>
  <main>
    <h1>Search Results for "<?php echo $searchTerm; ?>"</h1>
    
    <?php if (count($donuts) > 0): ?>
      <div class="cards-container">
        <?php foreach ($donuts as $donut): ?>
          <div class="card">
            <img src="/images/<?php echo $donut['image']; ?>" alt="<?php echo $donut['name']; ?>">
            <h2><?php echo $donut['name']; ?></h2>
            <p><?php echo $donut['description']; ?></p>
            <p>$<?php echo $donut['price']; ?></p>
            <a href="./item/item?id=<?php echo $donut['id']; ?>">View</a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>No results found.</p>
    <?php endif; ?>
      
    <div class="pagination">
      <?php if($page > 1): ?>
      <?php if ($page > 1): ?>
        <a href="./search?q=<?php echo $searchTerm; ?>&page=<?php echo $page - 1; ?>">Prev</a>
      <?php endif; ?>

      <?php if ($page < $totalPages): ?>
        <a href="./search?q=<?php echo $searchTerm; ?>&page=<?php echo $page + 1; ?>">Next</a>
      <?php endif; ?>
      <?php endif; ?>
    </div>  
  </main>

  <?php include_once "footer.php" ?>
</body>
</html>
