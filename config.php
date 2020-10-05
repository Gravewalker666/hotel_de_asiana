<?php
    session_start();
    $servername = "127.0.0.1";
    $username = $_SESSION['user'];
    $password = $_SESSION['password'];
    $database = "hotel_de_asiana";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully"; 
    } catch(PDOException $e) {
      header('Location: index.php?error="invalid username or password"');
    }
?>
