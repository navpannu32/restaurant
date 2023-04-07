<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Item</title>
</head>
<body>
  <h1>Create Item</h1>
  <form action="./scripts/createItem.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required >
    <label for="description">Description</label>
    <input type="text" name="description" id="description" required>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" required>
    <button type="submit">Create</button>
  </form>
</body>
</html>
