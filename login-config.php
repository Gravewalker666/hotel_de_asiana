<?php 
    session_start();
    if(isset($_POST['submit'])) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['password'] = $_POST['password'];
    }
?>