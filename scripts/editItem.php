
<?php
    include '../database/connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = 'UPDATE items SET name = "'.$name.'", description = "'.$description.'", price = '.$price.' WHERE id = '.$id.';';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('Location: ../index.php');
  ?>
