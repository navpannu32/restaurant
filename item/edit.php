<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/item/edit.css">
  <title>Edit item</title>
</head>
<body>
  <?php
    require_once '../database/connect.php';
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8')  ?? 1;
    $sql = 'SELECT * FROM items WHERE id = :id;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
  <?php require_once '../header.php'; ?>
  
  <h1>Edit item</h1>
  <form action="../scripts/editItem.php" method="post">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?php echo $item['description']; ?>">
    <label for="price">Price</label>
    <input type="number" name="price" id="price" value="<?php echo $item['price']; ?>">
    <button type="submit">Update</button>
  </form>
</body>
</html>
