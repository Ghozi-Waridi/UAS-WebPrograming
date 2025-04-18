<?php
$host = "127.0.0.1"; // <- fix IP localhost
$dbname = "newsPortal";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
/* $host = "127.0.1"; // localhost */
/* $dbname = "newsPortal"; */
/* $username = "root"; */
/* $password = ""; */
/**/
/* $conn = new mysqli($host, $username, $password, $dbname); */
/**/
/* if ($conn->connect_error) { */
/*   die("Connection failed: " . $conn->connect_error); */
/* } */
