<?php
$host="localhost"; // Host do MySQL
$user="root"; // Usuário do MySQL
$password=""; // Senha do MySQL
$database="forum"; // Database no MySQL

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
