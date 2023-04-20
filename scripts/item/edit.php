
<?php
    include '../../database/connect.php';

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');

    $image = $_POST['image'];

    $sql = 'UPDATE items SET name = "'.$name.'", description = "'.$description.'", price = '.$price.', image = "'.$image.'" WHERE id = '.$id.';';

    echo $sql;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('Location: ../../');
  ?>
