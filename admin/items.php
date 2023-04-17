<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/admin/item/items.css">
  <title>Donuts - Admin</title>
</head>
<body>
  <?php
    include '../header.php';
    require_once '../database/connect.php';

    if ($_COOKIE['role'] != "admin") {
      header("Location: ../");
      exit();
    }

    if(isset($_GET['page']) && $_GET['page'] >= 1) {
      $page = htmlspecialchars($_GET['page'], ENT_QUOTES, 'UTF-8')  ?? 1;
    } else {
      $page = 1;
    }

    $limit = 10;

    $offset = ($page - 1) * $limit;

    $countSql = 'SELECT COUNT(*) FROM items';
    $countStmt = $pdo->prepare($countSql);
    $countStmt->execute();
    $totalDonuts = $countStmt->fetchColumn();

    $totalPages = ceil($totalDonuts / $limit);

    $sql = 'SELECT * FROM items LIMIT :limit OFFSET :offset';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $donuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <h1>Donuts</h1>

  <div class="table-container">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($donuts as $donut): ?>
          <tr>
            <td><?= $donut['id'] ?></td>
            <td><?= $donut['name'] ?></td>
            <td><?= $donut['description'] ?></td>
            <td>$<?= number_format($donut['price'], 2) ?></td>
            <td>
              <a href="./edit_item?id=<?= $donut['id'] ?>">Edit</a>
              <a href="../scripts/item/delete?id=<?= $donut['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="pagination">
    <?php if ($totalPages > 1): ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $page): ?>
          <span><?= $i ?></span>
        <?php else: ?>
          <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endif ?>
      <?php endfor ?>
    <?php endif ?>
  </div>

  <?php require_once '.footer.php'; ?>
</body>
</html>
