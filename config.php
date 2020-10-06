<?php
    session_start();
    if (!isset($_POST['submit'])) {
      header('Location: index.php');
      exit();
    }
    $servername = "127.0.0.1";
    $username = $_POST['user'];
    $password = $_POST['password'];
    $database = "hotel_de_asiana";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_SESSION['user'] = $username;
      $_SESSION['password'] = $password;
      header('Location: dashboard');
    } catch(PDOException $e) {
      header('Location: index.php?error=422');
    }
?>
