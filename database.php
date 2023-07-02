<?php
$servername = "localhost";
$username = "murodjon";
$password = "mypass";
$port = 81;
$dbname = "database_name";

try {
  $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
