
<?php
    include '../../database/connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = 'UPDATE items SET name = "'.$name.'", description = "'.$description.'", price = '.$price.', image = "'.$image.'" WHERE id = '.$id.';';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('Location: ../../index.php');
  ?>
