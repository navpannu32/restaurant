<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
    <h1><a href="/restaurants/index.php" >Restaurant</a></h1>
    <nav>
      <ul>
        <?php if($_COOKIE["role"] == "admin") { ?>
        <li><a href="/restaurants/item/create.php">Create Item</a></li>        
        <?php }?>
        <?php if(isset($_COOKIE["name"])){ ?>
          <li><a href="/restaurants/scripts/logout.php">Logout</a></li>
          <?php } else {?>
            <li><a href="/restaurants/auth/signup.php">Sign Up</a></li>
            <li><a href="/restaurants/auth/login.php">Login</a></li>
          <?php } ?>
      </ul>
    </nav>
  </header>
</body>
</html>
