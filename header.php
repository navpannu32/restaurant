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
      <li>
        <form action="./search.php" method="GET">
          <input type="text" name="q" placeholder="Search Donuts">
          <button type="submit">Search</button>
        </form>
      </li>
        <?php if($_COOKIE['role'] == "admin") { ?>
          <li  class="nav-links">
            <a href="/admin/users.php">Users</a>
          </li>
          <li class="nav-links">
            <a href="/admin/items.php">Donuts</a>
          </li>
          <li  class="nav-links">
            <a href="/admin/comments.php">Comments</a>
          </li>
        <?php } ?>
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
  align-items: center;
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
header form {
  display: flex;
  align-items: center;
}

header form input[type="text"] {
  border: none;
  padding: 10px;
  font-size: 16px;
  margin-right: 10px;
}

header form button {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

header form button:hover {
  background-color: #000;
}
</style>
