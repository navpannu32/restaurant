<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  <header>
    <h1 class="logo"><a href="/index.php" >Donut Land</a></h1>
    <nav>
      <ul>
        <li  class="nav-links">
          <?php if($_COOKIE['role'] == "admin") { ?>
            <a href="admin.php">Admin</a>
          <?php } ?>
        </li>
        <?php if(isset($_COOKIE["name"])){ ?>
          <li class="nav-links"><a href="/scripts/auth/logout.php">Logout</a></li>
          <?php } else {?>
            <li class="nav-links"><a href="/auth/signup.php">Sign Up</a></li>
            <li class="nav-links"><a href="/auth/login.php">Login</a></li>
          <?php } ?>
      </ul>
    </nav>
  </header>
</body>
</html>

<style>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0,0,0,.1);
}

.logo {
  font-size: 24px;
}

.logo a {
  color: #333;
  text-decoration: none;
}

nav ul {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  margin: 0 10px;
}

nav li a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
  transition: all 0.3s ease;
}

nav li a:hover {
  color: #ff9f1a;
}
</style>
