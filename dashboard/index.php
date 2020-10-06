<?php session_start();
    require '../includes/header.php'; 
?>
<h1>Logged in Successfully <?php echo $_SESSION['user'] ?></h1>

<?php require '../includes/footer.php';?>
