<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  <header>
    <h1><a href="/index.php" >Restaurant</a></h1>
    <nav>
      <ul>
        <?php if($_COOKIE["role"] == "admin") { ?>
        <li><a href="/item/create.php">Create Item</a></li>        
        <?php }?>
        <?php if(isset($_COOKIE["name"])){ ?>
          <li><a href="/scripts/auth/logout.php">Logout</a></li>
          <?php } else {?>
            <li><a href="/auth/signup.php">Sign Up</a></li>
            <li><a href="/auth/login.php">Login</a></li>
          <?php } ?>
      </ul>
    </nav>
  </header>
</body>
</html>

<style>
  /* Set default font family and size */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  margin: 0;
  padding: 0;
}

/* Style the page header */
header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Style the logo link */
h1 a {
  color: #fff;
  text-decoration: none;
  font-size: 24px;
}

h1 a:hover {
  text-decoration: underline;
}

/* Style the navigation menu */
nav {
  display: flex;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav li {
  margin: 0 10px;
}

nav a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

nav a:hover {
  background-color: #fff;
  color: #333;
}

</style>
