<?php


require_once '../database/connect.php';

  if ($_COOKIE['role'] != "admin") {
    header("Location: ../index.php");
    exit();
  }
  
  $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
  
  $sql = 'SELECT * FROM items WHERE id = ?;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  $donut = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$donut) {
    echo '<h1>Donut not found</h1>';
    exit();
  }
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql = 'UPDATE donuts SET name = ?, description = ?, price = ?, image = ? WHERE id = ?;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $price, $image, $id]);
    header("Location: /admin/items.php");
    exit();
  }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin/item/edit.css">
    <title>Edit Donut</title>
  </head>
  <body>
  <?php include '../header.php'; ?>
    
    <h1>Edit Donut</h1>
    
  <form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $donut['name']; ?>" required>
    <label for="description">Description:</label>
    <textarea name="description" required><?php echo $donut['description']; ?></textarea>
    <label for="price">Price:</label>
    <input type="number" name="price" value="<?php echo $donut['price']; ?>" required>
    <input type="submit" value="Save">
  </form>


  <?php include '../footer.php'; ?>

</body>
</html>
