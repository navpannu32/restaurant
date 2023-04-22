<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/item/create.css">
  <title>Create Item</title>
</head>
<body>
  <?php
    session_start();
    require_once '../database/connect.php';
    $sql = 'SELECT * FROM categories;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
  <?php require_once '../header.php'; ?>
  <div class="container">
  <h1>Create Item</h1>
  <form action="../scripts/item/create" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required >
    <label for="description">Description</label>
    <textarea name="description" id="description" required></textarea>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" required>
    <label for="category">Category</label>
    <select name="category" id="category">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $item['category_id']) { echo 'selected'; } ?>><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
    <label for="image">Image</label>
    <input type="file" name="image" id="image">

    <p>
      <?php if(isset($_SESSION['error'])): ?>
        <?php echo $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>
    </p>

    <button type="submit">Create</button>
  </form>
  </div>
  <?php require_once '../footer.php'; ?>

</body>
</html>
