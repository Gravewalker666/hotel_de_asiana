<?php session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../index.php');
        exit();
    }
    require '../includes/header.php'; 
?>
<div class="row vh-100 w-100">
    <div class="col-2">
        <h4 class="font-sanista text-warning pt-5 p-2 text-center">
            Hotel De Asiana
        </h4>
        <h6 class="text-small text-muted text-center text-capitalize">
            <?php echo $_SESSION['user'] ?> dashboard
        </h6>
        <hr class="mx-5">
        <div class="ml-5">
            <div class="my-1 text-muted-light">
                <i class="fas fa-cog"></i> &nbsp; Help
            </div>
            <div class="my-1">
                <a href="../includes/logout.php" 
                    class="text-decoration-none text-muted-light"
                >
                    <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                </a>
            </div>
        </div>
    </div>
    <div class="col-10 bg-light">

    </div>
</div>
<?php require '../includes/footer.php';?>
