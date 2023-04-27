<?php

$host = 'restaurant-do-user-13934359-0.b.db.ondigitalocean.com';
$dbname = 'restaurant';
$username = 'doadmin';
$password = 'AVNS_LqX4gbySHT0HIK1lAYn';
$port = '25060';
$sslmode = 'REQUIRED';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;sslmode=$sslmode", $username, $password);
} catch (PDOException $e) {
    die("Failed to connect to the database: " . $e->getMessage());
}

  $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'restaurant'");
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result["SCHEMA_NAME"] != "restaurant") {
    $sql = file_get_contents("C:/xampp/htdocs/restaurant.sql");
    $pdo->exec($sql);
  }
?>
