<?php 
    session_start();
    $conn = new PDO("mysql:host=127.0.0.1;dbname=hotel_de_asiana", $_SESSION['user'], $_SESSION['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['add-room'])) {
        $type = $_POST['type'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $rate = $_POST['rate'];
        try {
            $conn->exec("INSERT INTO room(type, status, location, rate) VALUES ('$type', '$status', '$location', $rate)");
            header('Location: ../dashboard');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-room'])) {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $rate = $_POST['rate'];
        try {
            $conn->exec("UPDATE room SET type='$type', status='$status', location='$location', rate=$rate WHERE no=$id");
            header('Location: ../dashboard');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_GET['delete'])) {
        $table = $_GET['table'];
        $id = $_GET['id'];
        try {
            $conn->exec("DELETE FROM $table WHERE no=$id");
            header('Location: ../dashboard');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    $con = null;
?>
