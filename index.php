<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restaurants</title>
</head>
<body>
  <?php require_once 'header.php'; ?>
  <h1>Items</h1>

  <table>
    <thead>
      <tr>
        <th>name</th>
        <th>description</th>
        <th>price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  <?php require_once 'header.php'; ?>

      <?php
        require_once 'database/connect.php';
        $sql = 'SELECT * FROM items;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($items as $item) {
          echo '<tr>';
          echo '<td>' . $item['name'] . '</td>';
          echo '<td>' . $item['description'] . '</td>';
          echo '<td>' . $item['price'] . '</td>';
          echo '<td>' . '<a href="./item/item.php?id='.$item['id'].'">Details</a>';
          if($_COOKIE['role'] == "admin") {
            echo ' | <a href="./item/edit.php?id='.$item['id'].'">Edit</a> | '. '<a href="./scripts/item/delete.php?id='.$item['id'].'">Delete</a>' . '</td>';
          }
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>
</body>
</html>
