<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item</title>
</head>
<body>
  <?php require_once '../header.php'; ?>
  <h1>Item</h1>
  <?php
    require_once '../database/connect.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM items WHERE id = :id;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<h2>' . $item['name'] . '</h2>';
    echo '<p>' . $item['description'] . '</p>';
    echo '<p>' . $item['price'] . '</p>';
  ?>
</body>
</html>
