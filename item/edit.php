<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/edit/edit.css">
  <title>Edit Item</title>
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
  <?php
    $sql = 'SELECT * FROM categories;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);    
  ?>
  <div class="edit-item">
    <h1>Edit Item: <?php echo $item['name']; ?></h1>
    <form action="/scripts/item/edit.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>" required>
      <label for="description">Description</label>
      <textarea name="description" id="description" required><?php echo $item['description']; ?></textarea>
      <label for="price">Price</label>
      <input type="number" name="price" id="price" value="<?php echo $item['price']; ?>" required>
      <label for="category">Category</label>
    <select name="category" id="category">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $item['category_id']) { echo 'selected'; } ?>><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
      <label for="image">Image</label>
      <?php if ($item['image']) { ?>
        <img src="../images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
        <label for="remove-image">Remove image</label>
        <input type="checkbox" name="remove-image" id="remove-image">
      <?php } ?>
      <input type="file" name="image" id="image">
      <input type="submit" value="Update">
    </form>
  </div>
  <?php require_once '../footer.php'; ?>
</body>
</html>
