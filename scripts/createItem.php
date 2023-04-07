<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    include '../database/connect.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = 'INSERT INTO items (name, description, price) VALUES ("'.$name.'", "'.$description.'", '.$price.');';
    echo "$sql";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('Location: ../index.php');
  ?>
</body>
</html>
